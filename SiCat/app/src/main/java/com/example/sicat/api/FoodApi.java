/*-----------------------------------------------------------------------------
 - Developed by Haerul Muttaqin                                               -
 - Last modified 3/17/19 5:24 AM                                              -
 - Subscribe : https://www.youtube.com/haerulmuttaqin                         -
 - Copyright (c) 2019. All rights reserved                                    -
 -----------------------------------------------------------------------------*/
package com.example.sicat.api;

import com.example.sicat.model.Categories;
import com.example.sicat.model.Meals;

import retrofit2.Call;
import retrofit2.http.GET;

public interface FoodApi {

    /*
     * @GET (" url ") -->
     *     this is the request annotation with REQUEST METHOD [GET]
     *
     * Call <Object> methodName(); -->
     *     we will make the getCategoris () method with the Call <Category> || method meaning
     *     that the result of the request [GET] will be accommodated into Object (Category)
     *
     */

    @GET("Get_detail_menu.php")
    Call<Meals> getMeal();

    // TODO 12 also make the Call like getMeals() method for category
    @GET("Tbl_kategori.php")
    Call<Categories> getCategories();
}
