package com.example.sicat.activities.daftar_menu;

import android.support.annotation.NonNull;

import com.example.sicat.Utils;
import com.example.sicat.model.Categories;
import com.example.sicat.model.Meals;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MenuPresenter {

    private MenuView view;

    // TODO 15 Create the constructor (View)
    public MenuPresenter(MenuView view) {
        this.view = view;
    }

    void getMeals() {
        // TODO 16 do loading before making a request to the server
        view.showLoading();

        // TODO 17 with the line you have made a request
        Call<Meals> mealsCall = Utils.getApi().getMeal();

        // TODO 19 waiting for Callback
        mealsCall.enqueue(new Callback<Meals>() {
            @Override
            public void onResponse(@NonNull Call<Meals> call,@NonNull Response<Meals> response) {
                // TODO 20 Close loading when you have received a response from the server
                view.hideLoading();

                // TODO 21 Non-empty results check & Non-empty results check
                if (response.isSuccessful() && response.body() != null) {
                    /*
                     * TODO 22 Receive the result
                     * input the results obtained into the setMeals() behavior
                     * and enter response.body() to the parameter
                     */
                    view.setMeal(response.body().getMeals());

                }
                else {
                    // TODO 23 Show an error message if the conditions are not met
                    view.onErrorLoading(response.message());
                }
            }

            @Override
            public void onFailure(@NonNull Call<Meals> call,@NonNull Throwable t) {
                /*
                 * Failure will be thrown here
                 * for this you must do
                 * 1. closes loading
                 * 2. displays an error message
                 */

                // TODO 24 Close loading
                view.hideLoading();

                // TODO 25 Show an error message
                view.onErrorLoading(t.getLocalizedMessage());

            }
        });
    }


    void getCategories() {
        // TODO 26 do loading before making a request to the server
        view.showLoading();

        // TODO 27 create Call<Categories> categoriesCall = ...
        Call<Categories> categoriesCall = Utils.getApi().getCategories();

        // TODO 28 waiting for enqueue Callback
        categoriesCall.enqueue(new Callback<Categories>() {
            @Override
            public void onResponse(@NonNull Call<Categories> call,@NonNull Response<Categories> response) {

                view.hideLoading();

                // TODO 29 Non-empty results check & Non-empty results check
                if (response.isSuccessful() && response.body() != null) {
                    /*
                     * TODO 30 Receive the result
                     * input the results obtained into the setMeals() behavior
                     * and enter response.body() to the parameter
                     */
                    view.setCategory(response.body().getCategories());

                }
                else {
                    // TODO 31 Show an error message if the conditions are not met
                    view.onErrorLoading(response.message());
                }
            }

            @Override
            public void onFailure(@NonNull Call<Categories> call,@NonNull Throwable t) {
                /*
                 * Failure will be thrown here
                 * for this you must do
                 * 1. closes loading
                 * 2. displays an error message
                 */

                // TODO 32 Close loading
                view.hideLoading();

                // TODO 33 Show an error message
                view.onErrorLoading(t.getLocalizedMessage());
            }
        });
    }

    void getSearching(String name_meal) {
        // TODO 15. Make request meals by category
        view.showLoading();
        Call<Meals> mealsCall = Utils.getApi().getMealByNameLike(name_meal);
        mealsCall.enqueue(new Callback<Meals>() {
            @Override
            public void onResponse(@NonNull Call<Meals> call, @NonNull Response<Meals> response) {
                view.hideLoading();
                if (response.isSuccessful() && response.body() != null){
                    view.setMeal(response.body().getMeals());
                } else {
                    view.onErrorLoading(response.message());
                    getMeals();
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
