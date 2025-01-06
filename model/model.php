<?php
class Model {
    protected $dbconn;

    public function open() {
        $this->connectDB();
    }

    protected function connectDB() {
        $this->dbconn = mysqli_connect('localhost', 'root', '', 'dbase');
        if (!$this->dbconn) {
            die(mysqli_connect_error());
        }
    }

    public function query($query) {
        $result = mysqli_query($this->dbconn, $query);
        if (!$result) {
            die(mysqli_error($this->dbconn));
        }
        return $result;
    }

    public function fetch($result) {
        return mysqli_fetch_array($result);
    }

    public function close() {
        if ($this->dbconn) {
            mysqli_close($this->dbconn);
        }
    }
}
?>