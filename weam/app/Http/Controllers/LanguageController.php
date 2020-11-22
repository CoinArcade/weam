<?php

// TODO: pass language cookie creation on server-side

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LanguageController extends Controller
{
    /**
     * Supported locales
     */
    private $supported;

    /**
     * Remove locale from cache and insert the new locale
     */
    public function changeLanguage(Request $request, $locale)
    {
        $locale = preg_replace('/-/', '_', $locale);

        session()->has('settings.locale') ? App::setLocale(config('app.fallback_locale')) : App::setLocale(session('settings.locale'));

        if (session('settings.locale') !== $locale || App::getLocale() !== $locale) {
            $request->session()->forget('settings.locale');
            session(['settings.locale' => $locale]);

            $this->useLocale($request);
        }
    }

    /**
     * Get translations for the current language and store it on session and app env
     */
    private function useLocale($request)
    {
        $translations = collect();

        try {
            $client = new Client();
            $response = $client->get(config('app.url').'/languages/available');
            $data = json_decode($response->getBody(), true);
            if ($data['success']) {
                $this->supported = $data['success'];
            } else {

            }
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

        $locale = session('settings.locale');

        if (!in_array($locale, $this->supported) || $locale === null) {
            $request->session()->forget('settings.locale');
            session(['settings.locale' => config('app.fallback_locale')]);
        }

        App::setLocale(config('app.locales_app_match')[session('settings.locale')]);

        $translations = $this->phpTranslations(session('settings.locale'));
            
        $request->session()->forget('settings.translations');
        session(['settings.translations' => $translations]);
    }

    /**
     * Get translations from PHP files
     */
    private function phpTranslations($locale)
    {
        $path = resource_path("lang/$locale");

        return collect(File::allFiles($path))->flatMap(function ($file) use ($locale) {
            $key = ($translation = $file->getBasename('.php'));

            return [$key => trans($translation, [], $locale)];
        });
    }

    /**
     * Get translations from JSON files
     */
    private function jsonTranslations($locale)
    {
        $path = resource_path("lang/$locale.json");

        if (is_string($path) && is_readable($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }

    /**
     * Display a listing of available codes language.
     *
     * @return \Illuminate\Http\Response
     */
    public function availableLanguagesCode()
    {
        $languages = array_diff(scandir(resource_path('lang')), array('.', '..'));
        sort($languages);
        return $languages !== null ? json_encode(['success' => $languages]) : json_encode(['error' => 'Unable to recover available languages']);
    }

    /**
     * Display a listing of available languages name and code.
     *
     * @return \Illuminate\Http\Response
     */
    public function availableLanguagesCodeAndLanguage()
    {
        $available = config('app.available_locales');
        //sort($available);
        return $available !== null ? json_encode(['success' => $available]) : json_encode(['error' => 'Unable to recover available languages']);
    }
}
