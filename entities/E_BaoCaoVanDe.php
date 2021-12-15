<?php 
    class BaoCaoVanDe
    {
        private $MaBCVD;
        private $MaND;
        private $NoiDung;

        public function __construct($row)
        {
            $this->MaBCVD = $row['MaBCVD'];
            $this->MaND = $row['MaND'];
            $this->NoiDung = $row['NoiDung'];
        }

        function set_MaBCVD($MaBCVD)
        {
            $this->MaBCVD = $MaBCVD;
        }

        function get_MaBCVD()
        {
            return $this->MaBCVD;
        }

        function set_MaND($MaND)
        {
            $this->MaND = $MaND;
        }

        function get_MaND()
        {
            return $this->MaND;
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