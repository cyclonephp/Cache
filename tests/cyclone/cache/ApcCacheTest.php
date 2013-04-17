<?php
namespace cyclone\cache;
/**
 * @author Bence Erős <crystal@cyclonephp.org>
 */
class ApcCacheTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ApcCache
     */
    private $_cache;

    public function setUp() {
        $this->_cache = new ApcCache;
        apc_clear_cache('user');
        if ( ! ini_get('apc.enable_cli')) {
            $this->markTestSkipped('APC is not enabled in CLI');
        }
    }

    /**
     * @expectedException \cyclone\cache\CacheKeyNotFoundException
     */
    public function test_load() {
        apc_store('a', 'b');
        $this->assertEquals('b', $this->_cache->load('a'));
        apc_delete('a');
        $this->_cache->load('a');
    }

    public function test_get() {
        apc_store('a', 'b');
        $this->assertEquals('b', $this->_cache->get('a'));
        apc_delete('a');
        $this->assertNull($this->_cache->get('a'));
    }

    public function test_put() {
        $this->_cache->put('a', 'b');
        $this->assertTrue(apc_exists('a'));
    }

    public function test_exists() {
        $this->assertFalse($this->_cache->exists('a'));
        $this->_cache->put('a', 'b');
        $this->assertTrue($this->_cache->exists('a'));
    }


    public function test_delete() {
        apc_store('a', 'b');
        $this->assertTrue($this->_cache->delete('a'));
        $this->assertFalse(apc_exists('a'));
        $this->assertFalse($this->_cache->delete('a'));
    }

}
