//
// Created by getroot on 19. 12. 9.
//
#pragma once

#include <base/media_route/media_buffer.h>
#include <base/media_route/media_type.h>
#include <base/ovlibrary/ovlibrary.h>
#include <base/provider/application.h>
#include <base/provider/provider.h>
#include <orchestrator/orchestrator.h>

/*
 * OvtProvider
 * 		: Create PhysicalPort, OvtApplication
 *
 * OvtApplication
 * 		: Create MediaRouteApplicationConnector, OvtStream
 *
 * OvtStream
 * 		: Create by interface (PullStream)
 * 		: Create Thread, the Thread has a Queue
 * 				: Communicate with OvtPublisher of Origin Server
 * 				: Send packets by OvtProvider::PhysicalPort
 * 				: Receive packets from OvtProvider -> OvtApplication -> OvtStream -> Queue
 *
 */

namespace pvd
{
	class OvtProvider : public pvd::Provider
	{
	public:
		static std::shared_ptr<OvtProvider> Create(const cfg::Server &server_config, const std::shared_ptr<MediaRouteInterface> &router);

		explicit OvtProvider(const cfg::Server &server_config, const std::shared_ptr<MediaRouteInterface> &router);

		~OvtProvider() override;

		ProviderStreamDirection GetProviderStreamDirection() const override
		{
			return ProviderStreamDirection::Pull;
		}

		ProviderType GetProviderType() const override
		{
			return ProviderType::Ovt;
		}

		const char* GetProviderName() const override
		{
			return "OvtProvider";
		}
		
	protected:
		std::shared_ptr<pvd::Application> OnCreateProviderApplication(const info::Application &app_info) override;
		bool OnDeleteProviderApplication(const std::shared_ptr<pvd::Application> &application) override;
	};
}  // namespace pvd