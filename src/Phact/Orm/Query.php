<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15/04/16 11:02
 */

namespace Phact\Orm;


use Phact\Main\Phact;
use Phact\Orm\Adapters\Adapter;

class Query
{
    protected $_connectionName = 'default';
    protected $_adapter;

    public function __construct($connectionName = null)
    {
        if($connectionName){
            $this->_connectionName = $connectionName;
        }
    }
    
    public function setConnectionName($connectionName)
    {
        $this->_connectionName = $connectionName;
    }

    public function getConnectionName()
    {
        return $this->_connectionName;
    }

    public function getConnection()
    {
        $connectionName = $this->getConnectionName();
        return Phact::app()->db->getConnection($connectionName);
    }

    /**
     * @return Adapter
     */
    public function getAdapter()
    {
        return $this->getConnection()->getAdapter();
    }

    public function getQueryBuilder()
    {
        return $this->getConnection()->getQueryBuilder();
    }

    public function insert($tableName, $data)
    {
        $qb = $this->getQueryBuilder();
        return $qb->table($tableName)->insert($data);
    }

    public function updateByPk($tableName, $pkName, $pkValue, $data)
    {
        $qb = $this->getQueryBuilder();
        $statement = $qb->table($tableName)->where($pkName, $pkValue)->update($data);
        $code = $statement->errorCode();
        return $code === "00000";
    }

    public function delete($tableName, $pkName, $pkValue)
    {
        $qb = $this->getQueryBuilder();
        $statement = $qb->table($tableName)->where($pkName, $pkValue)->delete();
        $code = $statement->errorCode();
        return $code === "00000";
    }
}