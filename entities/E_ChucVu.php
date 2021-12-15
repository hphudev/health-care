<?php
    class ChucVu{
        private $MaCV;
        private $TenChucVu;
        private $TinhTrang;
        private $MacDinh;

        public function __construct($row)
        {
            $this->MaCV = $row['MaCV'];
            $this->TenChucVu = $row['TenChucVu'];
            $this->TinhTrang = $row['TinhTrang'];
            $this->MacDinh = $row['MacDinh'];
        }

        function set_MaCV($MaCV)
        {
            $this->MaCV = $MaCV;
        }

        function get_MaCV()
        {
            return $this->MaCV;
        }

        function set_TenChucVu($TenChucVu)
        {
            $this->TenChucVu = $TenChucVu;
        }

        function get_TenChucVu()
        {
            return $this->TenChucVu;
        }

        function set_TinhTrang($TinhTrang)
        {
            $this->TinhTrang = $TinhTrang;
        }

        function get_TinhTrang()
        {
            return $this->TinhTrang;
        }

        function set_MacDinh($MacDinh)
        {
            $this->MacDinh = $MacDinh;
        }

        function get_MacDinh()
        {
            return $this->MacDinh;
        }
        
    }
?>