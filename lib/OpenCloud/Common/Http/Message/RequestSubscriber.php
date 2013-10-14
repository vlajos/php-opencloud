<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2013 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Common\Http\Message;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Description of RequestSubscriber
 * 
 * @link 
 */
class RequestSubscriber implements EventSubscriberInterface
{
    
    public static function getInstance()
    {
        return new self();
    }
    
    public static function getSubscribedEvents()
    {
        return array(
            'curl.callback.progress' => 'doCurlProgress'
        );
    }
    
    public function doCurlProgress($options)
    {
        return array(
            'upload_size'   => $options['upload_size'],
            'uploaded'      => $options['uploaded']
        );
    }
    
}