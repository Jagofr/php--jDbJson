<?php
Class dbConnJagofrJsonDb {
    private $dbFileRoot = './';
    /**
     * @return string
     */
    function get_dbFileRoot() {
        return $this->dbFileRoot;
    }
    private $dbFileFolder = "dbs/";
    /**
     * @return string
     */
    function get_dbFileFolder() {
        return $this->dbFileFolder;
    }
    private $dbFileName = "testJsonData.json";
    /**
     * @return string
     */
    function get_dbFileName() {
        return $this->dbFileName;
    }
    private $dbFilePath = null;
    /**
     * @return string
     */
    function get_dbFilePath() {
        if($this->dbFileFolder == null) {
            $this->dbFilePath = $this->dbFileRoot . $this->dbFileFolder . $this->dbFileName;
            return $this->dbFilePath;
        }
        return $this->dbFilePath;
    }
    function set_dbFilePath(string $root, string $folder, string $file) {
        $this->dbFilePath = $root . '\\' . $folder . '\\' . $file;
        return;
    }
    private $db;
    private $dbDataStores;
    function __construct(string $docRoot = null, string $docFileFolder = null, string $docFileName = null){
        if ($docRoot != null && $docFileFolder != null && $docFileName != null) {
            $this->set_dbFilePath($docRoot, $docFileFolder, $docFileName);

            if (file_exists($this->get_dbFilePath())) { 
                $dbFileStream = fopen($this->get_dbFilePath(), 'r');
                $this->db = json_decode(fread($dbFileStream, filesize($this->get_dbFilePath())));
                $this->dbDataStores = $this->db->dataStores;
    
                $dbDataStoreEx = $this->db->dataStores;
                
            } else {
    
                echo "<pre> File does not exist: " . $this->get_dbFilePath() . "</pre>";
            }
            return;    
        }

        if (file_exists($this->get_dbFilePath())) { 
            $dbFileStream = fopen($this->get_dbFilePath(), 'r');
            $this->db = json_decode(fread($dbFileStream, filesize($this->get_dbFilePath())));
            $this->dbDataStores = $this->db->dataStores;

            $dbDataStoreEx = $this->db->dataStores;
            
        } else {

            echo "<pre> File does not exist: " . $this->get_dbFilePath() . "</pre>";
        }
        return;
    }
    public function showDataStoreByName(string $storeName = null) {
        if ($storeName == null) {
            echo "<pre>";
            print_r($this->dbDataStores);
            echo "</pre>";
            return true;
        }

        foreach ($this->dbDataStores as $value) {
            if($value->storeName == $storeName){
                echo "<pre>";
                print_r($value);
                echo "</pre>";
                return true;
            }
        }
        
        echo "<pre>";
        echo "This datastore does not exist.";
        echo "</pre>";
        return false;
    }
    public function showDataStoreById(int $storeId = null) {
        if($storeId < count($this->dbDataStores) && $storeId > -1)
            {echo "<pre>";
            print_r($this->dbDataStores[$storeId]);
            echo "</pre>";
            return true;
        }

        if ($storeId == null) {
            echo "<pre>";
            print_r($this->dbDataStores);
            echo "</pre>";
            return true;
        }

        echo "<pre>";
        echo "This datastore does not exist or out of range.";
        echo "</pre>";
        return false;
    }

    public function getDataStoreByName(string $storeName = null) {
        if ($storeName == null)
            return($this->dbDataStores);

        foreach ($this->dbDataStores as $value)
            if($value->storeName == $storeName)
                return ($value);

        return "This datastore does not exist.";
    }
    
    public function getDataStoreById(int $storeId = null) {
        if($storeId < count($this->dbDataStores) && $storeId > -1)
            return $this->dbDataStores[$storeId];

        if ($storeId == null) 
            return $this->dbDataStores;
        
        return "This datastore does not exist or out of range.";
    }

    function generateGUID($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
?>