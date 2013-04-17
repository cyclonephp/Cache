<?php
namespace cyclone\cache;
/**
 * @author Bence Erős <crystal@cyclonephp.org>
 * @package cache
 */
class FileCache extends AbstractCache {

    private $_root_dir;

    private $_write_on_shutdown;

    private $_loaded_files;

    /**
     * @param $root_dir string the root directory of the cache
     * @param $_write_on_shutdown boolean if FALSE then the cache contents will be flushed to the disk after every @c put()
     * calls. Otherwise the contructor registers a shutdown function which flushes the cache at the end of the execution
     * of the PHP program.
     */
    public function __construct($root_dir = '.cache', $_write_on_shutdown = TRUE) {
        $this->_root_dir = $root_dir;
        $this->_write_on_shutdown = $_write_on_shutdown;
        if ($_write_on_shutdown) {
            register_shutdown_function(function() {

            });
        }
    }

    public function load($key) {
        // TODO: Implement load() method.
    }

    public function put($key, $value) {
        // TODO: Implement put() method.
    }

    public function delete($key) {
        // TODO: Implement delete() method.
    }

}
