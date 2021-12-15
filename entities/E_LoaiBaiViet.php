<?php
    class LoaiBaiViet{
        private $MaLBV;
        private $TenLoaiBaiViet;

        public function __construct($row)
        {
            $this->MaLBV = $row['MaLBV'];
            $this->TenLoaiBaiViet = $row['TenLoaiBaiViet'];
        }

        function set_MaLBV($MaLBV)
        {
            $this->MaLBV = $MaLBV;
        }

        function get_MaLBV()
        {
            return $this->MaLBV;
        }

        function set_TenLoaiBaiViet($TenLoaiBaiViet)
        {
            $this->TenLoaiBaiViet = $TenLoaiBaiViet;
        }

        function get_TenLoaiBaiViet()
        {
            return $this->TenLoaiBaiViet;
        }
    }
?>