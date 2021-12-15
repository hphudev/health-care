<?php
    class TaiKhoan{
        private $TenDangNhap;
        private $MaND;
        private $MatKhau;

        public function __construct($row)
        {
            $this->MaND = $row['MaND'];
            $this->TenDangNhap = $row['TenDangNhap'];
            $this->MatKhau = $row['MatKhau'];
        }

        function set_MaND($MaND)
        {
            $this->MaND = $MaND;
        }

        function get_MaND()
        {
            return $this->MaND;
        }

        function set_TenDangNhap($TenDangNhap)
        {
            $this->TenDangNhap = $TenDangNhap;
        }

        function get_TenDangNhap()
        {
            return $this->TenDangNhap;
        }

        function set_MatKhau($MatKhau)
        {
            $this->MatKhau = $MatKhau;
        }

        function get_MatKhau()
        {
            return $this->MatKhau;
        }
    }
?>