<?php 
    class BinhLuan
    {
        private $MaBL;
        private $MaND;
        private $MaBV;
        private $NoiDung;

        public function __construct($row)
        {
            $this->MaBL = $row['MaBL'];
            $this->MaND = $row['MaND'];
            $this->MaBV = $row['MaBV'];
            $this->NoiDung = $row['NoiDung'];
        }

        function set_MaBL($MaBL)
        {
            $this->MaBL = $MaBL;
        }

        function get_MaBL()
        {
            return $this->MaBL;
        }

        function set_MaND($MaND)
        {
            $this->MaND = $MaND;
        }

        function get_MaND()
        {
            return $this->MaND;
        }

        function set_MaBV($MaBV)
        {
            $this->MaBV = $MaBV;
        }

        function get_MaBV()
        {
            return $this->MaBV;
        }

        function set_NoiDung($NoiDung)
        {
            $this->NoiDung = $NoiDung;
        }

        function get_NoiDung()
        {
            return $this->NoiDung;
        }
    }
?>