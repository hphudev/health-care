<?php
    class PhanQuyen{
        private $MaCV;
        private $TenPhanQuyen;

        public function __construct($row)
        {
            $this->TenPhanQuyen = $row['TenPhanQuyen'];
            $this->MaCV = $row['MaCV'];
        }

        function set_MaCV($MaCV)
        {
            $this->MaCV = $MaCV;
        }

        function get_MaCV()
        {
            return $this->MaCV;
        }

        function set_TenPhanQuyen($TenPhanQuyen)
        {
            $this->TenPhanQuyen = $TenPhanQuyen;
        }

        function get_TenPhanQuyen()
        {
            return $this->TenPhanQuyen;
        }
    }
?>