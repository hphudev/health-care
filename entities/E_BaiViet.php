c<?php 
    class BaiViet
    {
        private $MaBV;
        private $TieuDe;
        private $MoTa;
        private $NoiDung;
        private $NgayDang;
        private $MaLBV;
        private $MaTacGia;
        private $LuotXem;
        private $TBSao;
        private $TinhTrang;

        public function __construct($row)
        {
            $this->MaBV = $row['MaBV'];
            $this->TieuDe = $row['TieuDe'];
            $this->MoTa = $row['MoTa'];
            $this->NoiDung = $row['NoiDung'];
            $this->NgayDang = $row['NgayDang'];
            $this->MaLBV = $row['MaLBV'];
            $this->MaTacGia = $row['MaTacGia'];
            $this->LuotXem = $row['LuotXem'];
            $this->TBSao = $row['TBSao'];
            $this->TinhTrang = $row['TinhTrang'];
        }

        function set_MaBV($MaBV)
        {
            $this->MaBV = $MaBV;
        }

        function get_MaBV()
        {
            return $this->MaBV;
        }
        
        function set_TieuDe($TieuDe)
        {
            $this->TieuDe = $TieuDe;
        }

        function get_TieuDe()
        {
            return $this->TieuDe;
        }

        function set_MoTa($MoTa)
        {
            $this->MoTa = $MoTa;
        }

        function get_MoTa()
        {
            return $this->MoTa;
        }

        function set_NoiDung($NoiDung)
        {
            $this->NoiDung = $NoiDung;
        }

        function get_NoiDung()
        {
            return $this->NoiDung;
        }

        function set_NgayDang($NgayDang)
        {
            $this->NgayDang = $NgayDang;
        }

        function get_NgayDang()
        {
            return $this->NgayDang;
        }

        function set_MaLBV($MaLBV)
        {
            $this->MaLBV = $MaLBV;
        }

        function get_MaLBV()
        {
            return $this->MaLBV;
        }

        function set_MaTacGia($MaTacGia)
        {
            $this->MaTacGia = $MaTacGia;
        }

        function get_MaTacGia()
        {
            return $this->MaTacGia;
        }

        function set_LuotXem($LuotXem)
        {
            $this->LuotXem = $LuotXem;
        }

        function get_LuotXem()
        {
            return $this->LuotXem;
        }

        function set_TBSao($TBSao)
        {
            $this->TBSao = $TBSao;
        }

        function get_TBSao()
        {
            return $this->TBSao;
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