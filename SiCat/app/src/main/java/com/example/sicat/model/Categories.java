package com.example.sicat.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Categories {

    @SerializedName("categories")
    @Expose
    private List<Category> categories = null;
    @SerializedName("success")
    @Expose
    private String success;
    @SerializedName("message")
    @Expose
    private String message;

    public List<Category> getCategories() {
        return categories;
    }

    public void setCategories(List<Category> categories) {
        this.categories = categories;
    }

    public String getSuccess() {
        return success;
    }

    public void setSuccess(String success) {
        this.success = success;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public static class Category {

        @SerializedName("id_kat")
        @Expose
        private String idKat;
        @SerializedName("nm_kat")
        @Expose
        private String nmKat;
        @SerializedName("gmbr_kat")
        @Expose
        private String gmbrKat;
        @SerializedName("desk_kat")
        @Expose
        private String deskKat;

        public String getIdKat() {
            return idKat;
        }

        public void setIdKat(String idKat) {
            this.idKat = idKat;
        }

        public String getNmKat() {
            return nmKat;
        }

        public void setNmKat(String nmKat) {
            this.nmKat = nmKat;
        }

        public String getGmbrKat() {
            return gmbrKat;
        }

        public void setGmbrKat(String gmbrKat) {
            this.gmbrKat = gmbrKat;
        }

        public String getDeskKat() {
            return deskKat;
        }

        public void setDeskKat(String deskKat) {
            this.deskKat = deskKat;
        }

    }
}
