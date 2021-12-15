<?php
    class NguoiDung{
        private $MaND;
        private $HoTen;
        private $GioiTinh;
        private $NgaySinh;
        private $Email;
        private $MaCV;
        private $TinhTrang;

        public function __construct($row)
        {
            $this->MaND = $row['MaND'];
            $this->HoTen = $row['HoTen'];
            $this->GioiTinh = $row['GioiTinh'];
            $this->NgaySinh = $row['NgaySinh'];
            $this->Email = $row['Email'];
            $this->MaCV = $row['MaCV'];
            $this->TinhTrang = $row['TinhTrang'];
        }

        function set_MaND($MaND)
        {
            $this->MaND = $MaND;
        }

        function get_MaND()
        {
            return $this->MaND;
        }

        function set_HoTen($HoTen)
        {
            $this->HoTen = $HoTen;
        }

        function get_HoTen()
        {
            return $this->HoTen;
        }

        function set_GioiTinh($GioiTinh)
        {
            $this->GioiTinh = $GioiTinh;
        }

        function get_GioiTinh()
        {
            return $this->GioiTinh;
        }

        function set_NgaySinh($NgaySinh)
        {
            $this->NgaySinh = $NgaySinh;
        }

        function get_NgaySinh()
        {
            return $this->NgaySinh;
        }

        function set_Email($Email)
        {
            $this->Email = $Email;
        }

        function get_Email()
        {
            return $this->Email;
        }

        function set_MaCV($MaCV)
        {
            $this->MaCV = $MaCV;
        }

        function get_MaCV()
        {
            return $this->MaCV;
        }

        function set_TinhTrang($TinhTrang)
        {
            $this->TinhTrang = $TinhTrang;
        }

        function get_TinhTrang()
        {
            return $this->TinhTrang;
        }
    }
?>