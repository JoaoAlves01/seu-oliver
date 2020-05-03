<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Options;
use Twilio\Values;

abstract class FlexFlowOptions {
    /**
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     * @return ReadFlexFlowOptions Options builder
     */
    public static function read(string $friendlyName = Values::NONE): ReadFlexFlowOptions {
        return new ReadFlexFlowOptions($friendlyName);
    }

    /**
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel The task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     * @return CreateFlexFlowOptions Options builder
     */
    public static function create(string $contactIdentity = Values::NONE, bool $enabled = Values::NONE, string $integrationType = Values::NONE, string $integrationFlowSid = Values::NONE, string $integrationUrl = Values::NONE, string $integrationWorkspaceSid = Values::NONE, string $integrationWorkflowSid = Values::NONE, string $integrationChannel = Values::NONE, int $integrationTimeout = Values::NONE, int $integrationPriority = Values::NONE, bool $integrationCreationOnMessage = Values::NONE, bool $longLived = Values::NONE, bool $janitorEnabled = Values::NONE, int $integrationRetryCount = Values::NONE): CreateFlexFlowOptions {
        return new CreateFlexFlowOptions($contactIdentity, $enabled, $integrationType, $integrationFlowSid, $integrationUrl, $integrationWorkspaceSid, $integrationWorkflowSid, $integrationChannel, $integrationTimeout, $integrationPriority, $integrationCreationOnMessage, $longLived, $janitorEnabled, $integrationRetryCount);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $chatServiceSid The SID of the chat service
     * @param string $channelType The channel type
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted.
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     * @return UpdateFlexFlowOptions Options builder
     */
    public static function update(string $friendlyName = Values::NONE, string $chatServiceSid = Values::NONE, string $channelType = Values::NONE, string $contactIdentity = Values::NONE, bool $enabled = Values::NONE, string $integrationType = Values::NONE, string $integrationFlowSid = Values::NONE, string $integrationUrl = Values::NONE, string $integrationWorkspaceSid = Values::NONE, string $integrationWorkflowSid = Values::NONE, string $integrationChannel = Values::NONE, int $integrationTimeout = Values::NONE, int $integrationPriority = Values::NONE, bool $integrationCreationOnMessage = Values::NONE, bool $longLived = Values::NONE, bool $janitorEnabled = Values::NONE, int $integrationRetryCount = Values::NONE): UpdateFlexFlowOptions {
        return new UpdateFlexFlowOptions($friendlyName, $chatServiceSid, $channelType, $contactIdentity, $enabled, $integrationType, $integrationFlowSid, $integrationUrl, $integrationWorkspaceSid, $integrationWorkflowSid, $integrationChannel, $integrationTimeout, $integrationPriority, $integrationCreationOnMessage, $longLived, $janitorEnabled, $integrationRetryCount);
    }
}

class ReadFlexFlowOptions extends Options {
    /**
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     */
    public function __construct(string $friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The `friendly_name` of the FlexFlow resources to read.
     *
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.ReadFlexFlowOptions ' . $options . ']';
    }
}

class CreateFlexFlowOptions extends Options {
    /**
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel The task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     */
    public function __construct(string $contactIdentity = Values::NONE, bool $enabled = Values::NONE, string $integrationType = Values::NONE, string $integrationFlowSid = Values::NONE, string $integrationUrl = Values::NONE, string $integrationWorkspaceSid = Values::NONE, string $integrationWorkflowSid = Values::NONE, string $integrationChannel = Values::NONE, int $integrationTimeout = Values::NONE, int $integrationPriority = Values::NONE, bool $integrationCreationOnMessage = Values::NONE, bool $longLived = Values::NONE, bool $janitorEnabled = Values::NONE, int $integrationRetryCount = Values::NONE) {
        $this->options['contactIdentity'] = $contactIdentity;
        $this->options['enabled'] = $enabled;
        $this->options['integrationType'] = $integrationType;
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        $this->options['integrationUrl'] = $integrationUrl;
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        $this->options['integrationChannel'] = $integrationChannel;
        $this->options['integrationTimeout'] = $integrationTimeout;
        $this->options['integrationPriority'] = $integrationPriority;
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        $this->options['longLived'] = $longLived;
        $this->options['janitorEnabled'] = $janitorEnabled;
        $this->options['integrationRetryCount'] = $integrationRetryCount;
    }

    /**
     * The channel contact's Identity.
     *
     * @param string $contactIdentity The channel contact's Identity
     * @return $this Fluent Builder
     */
    public function setContactIdentity(string $contactIdentity): self {
        $this->options['contactIdentity'] = $contactIdentity;
        return $this;
    }

    /**
     * Whether the new FlexFlow is enabled.
     *
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @return $this Fluent Builder
     */
    public function setEnabled(bool $enabled): self {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The integration type. Can be: `studio`, `external`, or `task`.
     *
     * @param string $integrationType The integration type
     * @return $this Fluent Builder
     */
    public function setIntegrationType(string $integrationType): self {
        $this->options['integrationType'] = $integrationType;
        return $this;
    }

    /**
     * The SID of the Flow when `integration_type` is `studio`.
     *
     * @param string $integrationFlowSid The SID of the Flow
     * @return $this Fluent Builder
     */
    public function setIntegrationFlowSid(string $integrationFlowSid): self {
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        return $this;
    }

    /**
     * The External Webhook URL when `integration_type` is `external`.
     *
     * @param string $integrationUrl The External Webhook URL
     * @return $this Fluent Builder
     */
    public function setIntegrationUrl(string $integrationUrl): self {
        $this->options['integrationUrl'] = $integrationUrl;
        return $this;
    }

    /**
     * The Workspace SID for a new task for Task `integration_type`.
     *
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkspaceSid(string $integrationWorkspaceSid): self {
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        return $this;
    }

    /**
     * The Workflow SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkflowSid(string $integrationWorkflowSid): self {
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        return $this;
    }

    /**
     * The task channel for a new task when `integration_type` is `task`. The default is `default`.
     *
     * @param string $integrationChannel The task channel for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationChannel(string $integrationChannel): self {
        $this->options['integrationChannel'] = $integrationChannel;
        return $this;
    }

    /**
     * The task timeout in seconds for a new task when `integration_type` is `task`. The default is `86,400` seconds (24 hours).
     *
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationTimeout(int $integrationTimeout): self {
        $this->options['integrationTimeout'] = $integrationTimeout;
        return $this;
    }

    /**
     * The task priority of a new task when `integration_type` is `task`. The default priority is `0`.
     *
     * @param int $integrationPriority The task priority of a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationPriority(int $integrationPriority): self {
        $this->options['integrationPriority'] = $integrationPriority;
        return $this;
    }

    /**
     * Whether to create a task when the first message arrives when `integration_type` is `task`. If `false`, the task is created with the channel. **Note** that does not apply when channel type is `web`. Setting the value to `true` for channel type `web` will result in misconfigured Flex Flow and no tasks will be created.
     *
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @return $this Fluent Builder
     */
    public function setIntegrationCreationOnMessage(bool $integrationCreationOnMessage): self {
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        return $this;
    }

    /**
     * When enabled, Flex will keep the chat channel active so that it may be used for subsequent interactions with a contact identity.
     *
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @return $this Fluent Builder
     */
    public function setLongLived(bool $longLived): self {
        $this->options['longLived'] = $longLived;
        return $this;
    }

    /**
     * When enabled, the Messaging Channel Janitor will remove active Proxy sessions if the associated Task is deleted outside of the Flex UI.
     *
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted
     * @return $this Fluent Builder
     */
    public function setJanitorEnabled(bool $janitorEnabled): self {
        $this->options['janitorEnabled'] = $janitorEnabled;
        return $this;
    }

    /**
     * The number of times to retry the webhook if the first attempt fails. Can be an integer between 0 and 3, inclusive, and the default is 0.
     *
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     * @return $this Fluent Builder
     */
    public function setIntegrationRetryCount(int $integrationRetryCount): self {
        $this->options['integrationRetryCount'] = $integrationRetryCount;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.CreateFlexFlowOptions ' . $options . ']';
    }
}

class UpdateFlexFlowOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $chatServiceSid The SID of the chat service
     * @param string $channelType The channel type
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted.
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     */
    public function __construct(string $friendlyName = Values::NONE, string $chatServiceSid = Values::NONE, string $channelType = Values::NONE, string $contactIdentity = Values::NONE, bool $enabled = Values::NONE, string $integrationType = Values::NONE, string $integrationFlowSid = Values::NONE, string $integrationUrl = Values::NONE, string $integrationWorkspaceSid = Values::NONE, string $integrationWorkflowSid = Values::NONE, string $integrationChannel = Values::NONE, int $integrationTimeout = Values::NONE, int $integrationPriority = Values::NONE, bool $integrationCreationOnMessage = Values::NONE, bool $longLived = Values::NONE, bool $janitorEnabled = Values::NONE, int $integrationRetryCount = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['chatServiceSid'] = $chatServiceSid;
        $this->options['channelType'] = $channelType;
        $this->options['contactIdentity'] = $contactIdentity;
        $this->options['enabled'] = $enabled;
        $this->options['integrationType'] = $integrationType;
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        $this->options['integrationUrl'] = $integrationUrl;
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        $this->options['integrationChannel'] = $integrationChannel;
        $this->options['integrationTimeout'] = $integrationTimeout;
        $this->options['integrationPriority'] = $integrationPriority;
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        $this->options['longLived'] = $longLived;
        $this->options['janitorEnabled'] = $janitorEnabled;
        $this->options['integrationRetryCount'] = $integrationRetryCount;
    }

    /**
     * A descriptive string that you create to describe the FlexFlow resource.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The SID of the chat service.
     *
     * @param string $chatServiceSid The SID of the chat service
     * @return $this Fluent Builder
     */
    public function setChatServiceSid(string $chatServiceSid): self {
        $this->options['chatServiceSid'] = $chatServiceSid;
        return $this;
    }

    /**
     * The channel type. Can be: `web`, `facebook`, `sms`, `whatsapp`, `line` or `custom`.
     *
     * @param string $channelType The channel type
     * @return $this Fluent Builder
     */
    public function setChannelType(string $channelType): self {
        $this->options['channelType'] = $channelType;
        return $this;
    }

    /**
     * The channel contact's Identity.
     *
     * @param string $contactIdentity The channel contact's Identity
     * @return $this Fluent Builder
     */
    public function setContactIdentity(string $contactIdentity): self {
        $this->options['contactIdentity'] = $contactIdentity;
        return $this;
    }

    /**
     * Whether the FlexFlow is enabled.
     *
     * @param bool $enabled Whether the FlexFlow is enabled
     * @return $this Fluent Builder
     */
    public function setEnabled(bool $enabled): self {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The integration type. Can be: `studio`, `external`, or `task`.
     *
     * @param string $integrationType The integration type
     * @return $this Fluent Builder
     */
    public function setIntegrationType(string $integrationType): self {
        $this->options['integrationType'] = $integrationType;
        return $this;
    }

    /**
     * The SID of the Flow when `integration_type` is `studio`.
     *
     * @param string $integrationFlowSid The SID of the Flow
     * @return $this Fluent Builder
     */
    public function setIntegrationFlowSid(string $integrationFlowSid): self {
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        return $this;
    }

    /**
     * The External Webhook URL when `integration_type` is `external`.
     *
     * @param string $integrationUrl The External Webhook URL
     * @return $this Fluent Builder
     */
    public function setIntegrationUrl(string $integrationUrl): self {
        $this->options['integrationUrl'] = $integrationUrl;
        return $this;
    }

    /**
     * The Workspace SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkspaceSid(string $integrationWorkspaceSid): self {
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        return $this;
    }

    /**
     * The Workflow SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkflowSid(string $integrationWorkflowSid): self {
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        return $this;
    }

    /**
     * The task channel for a new task when `integration_type` is `task`. The default is `default`.
     *
     * @param string $integrationChannel task channel for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationChannel(string $integrationChannel): self {
        $this->options['integrationChannel'] = $integrationChannel;
        return $this;
    }

    /**
     * The task timeout in seconds for a new task when `integration_type` is `task`. The default is `86,400` seconds (24 hours).
     *
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationTimeout(int $integrationTimeout): self {
        $this->options['integrationTimeout'] = $integrationTimeout;
        return $this;
    }

    /**
     * The task priority of a new task when `integration_type` is `task`. The default priority is `0`.
     *
     * @param int $integrationPriority The task priority of a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationPriority(int $integrationPriority): self {
        $this->options['integrationPriority'] = $integrationPriority;
        return $this;
    }

    /**
     * Whether to create a task when the first message arrives when `integration_type` is `task`. If `false`, the task is created with the channel. **Note** that does not apply when channel type is `web`. Setting the value to `true` for channel type `web` will result in misconfigured Flex Flow and no tasks will be created.
     *
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @return $this Fluent Builder
     */
    public function setIntegrationCreationOnMessage(bool $integrationCreationOnMessage): self {
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        return $this;
    }

    /**
     * When enabled, Flex will keep the chat channel active so that it may be used for subsequent interactions with a contact identity.
     *
     * @param bool $longLived Reuse this chat channel for future interactions with
     *                        a contact
     * @return $this Fluent Builder
     */
    public function setLongLived(bool $longLived): self {
        $this->options['longLived'] = $longLived;
        return $this;
    }

    /**
     * When enabled, the Messaging Channel Janitor will remove active Proxy sessions if the associated Task is deleted outside of the Flex UI.
     *
     * @param bool $janitorEnabled Remove active Proxy sessions if the
     *                             corresponding Task is deleted.
     * @return $this Fluent Builder
     */
    public function setJanitorEnabled(bool $janitorEnabled): self {
        $this->options['janitorEnabled'] = $janitorEnabled;
        return $this;
    }

    /**
     * The number of times to retry the webhook if the first attempt fails. Can be an integer between 0 and 3, inclusive, and the default is 0.
     *
     * @param int $integrationRetryCount The number of times to retry the webhook
     *                                   if the first attempt fails
     * @return $this Fluent Builder
     */
    public function setIntegrationRetryCount(int $integrationRetryCount): self {
        $this->options['integrationRetryCount'] = $integrationRetryCount;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.UpdateFlexFlowOptions ' . $options . ']';
    }
}