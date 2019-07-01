package com.example.sicat.model;

public class Transaksi {

    String id_prasmanan,id_customer,nm_customer,id_paket,nm_paket,upload_bukti_bayar,	ket_acara,tgl_pemesanan,tgl_pelunasan,tgl_acara,status;
    int jml_porsi,tot_biaya,tot_dp,sisa_bayar;

    public String getId_prasmanan() {
        return id_prasmanan;
    }

    public void setId_prasmanan(String id_prasmanan) {
        this.id_prasmanan = id_prasmanan;
    }

    public String getId_customer() {
        return id_customer;
    }

    public void setId_customer(String id_customer) {
        this.id_customer = id_customer;
    }

    public String getNm_customer() {
        return nm_customer;
    }

    public void setNm_customer(String nm_customer) {
        this.nm_customer = nm_customer;
    }

    public String getId_paket() {
        return id_paket;
    }

    public void setId_paket(String id_paket) {
        this.id_paket = id_paket;
    }

    public String getNm_paket() {
        return nm_paket;
    }

    public void setNm_paket(String nm_paket) {
        this.nm_paket = nm_paket;
    }

    public String getUpload_bukti_bayar() {
        return upload_bukti_bayar;
    }

    public void setUpload_bukti_bayar(String upload_bukti_bayar) {
        this.upload_bukti_bayar = upload_bukti_bayar;
    }

    public String getKet_acara() {
        return ket_acara;
    }

    public void setKet_acara(String ket_acara) {
        this.ket_acara = ket_acara;
    }

    public String getTgl_pemesanan() {
        return tgl_pemesanan;
    }

    public void setTgl_pemesanan(String tgl_pemesanan) {
        this.tgl_pemesanan = tgl_pemesanan;
    }

    public String getTgl_pelunasan() {
        return tgl_pelunasan;
    }

    public void setTgl_pelunasan(String tgl_pelunasan) {
        this.tgl_pelunasan = tgl_pelunasan;
    }

    public String getTgl_acara() {
        return tgl_acara;
    }

    public void setTgl_acara(String tgl_acara) {
        this.tgl_acara = tgl_acara;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public int getJml_porsi() {
        return jml_porsi;
    }

    public void setJml_porsi(int jml_porsi) {
        this.jml_porsi = jml_porsi;
    }

    public int getTot_biaya() {
        return tot_biaya;
    }

    public void setTot_biaya(int tot_biaya) {
        this.tot_biaya = tot_biaya;
    }

    public int getTot_dp() {
        return tot_dp;
    }

    public void setTot_dp(int tot_dp) {
        this.tot_dp = tot_dp;
    }

    public int getSisa_bayar() {
        return sisa_bayar;
    }

    public void setSisa_bayar(int sisa_bayar) {
        this.sisa_bayar = sisa_bayar;
    }
}
