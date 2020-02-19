<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Messaging\V1;

/**
 * @property \Twilio\Rest\Messaging\V1 $v1
 * @property \Twilio\Rest\Messaging\V1\ServiceList $services
 * @property \Twilio\Rest\Messaging\V1\SessionList $sessions
 * @property \Twilio\Rest\Messaging\V1\WebhookList $webhooks
 * @method \Twilio\Rest\Messaging\V1\ServiceContext services(string $sid)
 * @method \Twilio\Rest\Messaging\V1\SessionContext sessions(string $sid)
 * @method \Twilio\Rest\Messaging\V1\WebhookContext webhooks()
 */
class Messaging extends Domain {
    protected $_v1;

    /**
     * Construct the Messaging Domain
     *
     * @param Client $client Client to communicate with Twilio
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://messaging.twilio.com';
    }

    /**
     * @return V1 Version v1 of messaging
     */
    protected function getV1(): V1 {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) {
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array([$this, $method], $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    protected function getServices(): \Twilio\Rest\Messaging\V1\ServiceList {
        return $this->v1->services;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextServices(string $sid): \Twilio\Rest\Messaging\V1\ServiceContext {
        return $this->v1->services($sid);
    }

    protected function getSessions(): \Twilio\Rest\Messaging\V1\SessionList {
        return $this->v1->sessions;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextSessions(string $sid): \Twilio\Rest\Messaging\V1\SessionContext {
        return $this->v1->sessions($sid);
    }

    protected function getWebhooks(): \Twilio\Rest\Messaging\V1\WebhookList {
        return $this->v1->webhooks;
    }

    protected function contextWebhooks(): \Twilio\Rest\Messaging\V1\WebhookContext {
        return $this->v1->webhooks();
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Messaging]';
    }
}