package com.example.sicat.controllers;

public class Base_url {
    String url;

    public Base_url() {
        setUrl("http://192.168.137.1/project_smtr4/web/api/");
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }
}
