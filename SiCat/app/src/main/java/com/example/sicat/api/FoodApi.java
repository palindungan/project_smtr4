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
import retrofit2.http.Query;

public interface FoodApi {

    @GET("get_detail_menu") // nama file
    Call<Meals> getMeal();

    // TODO 12 also make the Call like getMeals() method for category
    @GET("tbl_kategori") // nama file
    Call<Categories> getCategories();

    // TODO 14. add interface get meals by category
    @GET("filter")
    Call<Meals> getMealByCategory(@Query("nm_kat") String category);

    @GET("search")
    Call<Meals> getMealByName(@Query("nm_menu") String mealName);

    @GET("search_like")
    Call<Meals> getMealByNameLike(@Query("nm_menu") String mealName);

    @GET("search_like_and_category")
    Call<Meals> getMealByNameLikeAndCategory(@Query("nm_menu") String mealName,@Query("nm_kat") String category);

    /*
     * @GET (" url ") -->
     *     this is the request annotation with REQUEST METHOD [GET]
     *
     * Call <Object> methodName(); -->
     *     we will make the getCategoris () method with the Call <Category> || method meaning
     *     that the result of the request [GET] will be accommodated into Object (Category)
     *
     */


}
