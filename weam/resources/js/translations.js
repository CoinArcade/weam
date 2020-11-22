module.exports = {

    methods: {

        /**
         * Translate the given key.
         */
        __(key, count = 1, replace = []) {

            let translation,
                translationNotFound = true,
                index = count - 1;

            key = 'tr.' + key

            try {
                translation = key.split('.').reduce((t, i) => t[i] || null, window._translations).split('|')

                if (index < 0 || index >= translation.length) index = 0;
                translation = count > 1 ? translation[index] : translation[0]

                if (translation) {
                    translationNotFound = false
                }
            } catch (e) {
                translation = key.split('.').pop()
            }

            if (translationNotFound) {
                translation = key.split('.').pop()
            }

            let occurences = translation.match(/:[a-z0-9]+/gi)
            for (let o in occurences) {
                translation = translation.replace(occurences[o], replace[o])
            }

            return translation

        }

    }

}