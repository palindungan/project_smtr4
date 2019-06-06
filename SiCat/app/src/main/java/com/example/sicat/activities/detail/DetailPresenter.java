/*-----------------------------------------------------------------------------
 - Developed by Haerul Muttaqin                                               -
 - Last modified 4/7/19 7:07 PM                                               -
 - Subscribe : https://www.youtube.com/haerulmuttaqin                         -
 - Copyright (c) 2019. All rights reserved                                    -
 -----------------------------------------------------------------------------*/
package com.example.sicat.activities.detail;

import android.support.annotation.NonNull;

import com.example.sicat.Utils;
import com.example.sicat.model.Meals;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DetailPresenter {
    private DetailView view;

    public DetailPresenter(DetailView view) {
        this.view = view;
    }

    void getMealById(String mealName) {
        
        //TODO #5 Call the void show loading before starting to make a request to the server
        view.showLoading();

        //TODO #6 Make a request to the server (Don't forget to hide loading when the response is received)
        //TODO #7 Set response (meal)
        Utils.getApi().getMealByName(mealName).enqueue(new Callback<Meals>() {
            @Override
            public void onResponse(@NonNull Call<Meals> call,@NonNull Response<Meals> response) {
                view.hideLoading();
                if (response.isSuccessful() && response.body() != null){
                    view.setMeal(response.body().getMeals().get(0));//index 0 untuk "meals"
                } else {
                    view.onErrorLoading(response.message());
                }
            }

            @Override
            public void onFailure(@NonNull Call<Meals> call,@NonNull Throwable t) {
                view.hideLoading();
                view.onErrorLoading(t.getLocalizedMessage());
            }
        });
    }
}
