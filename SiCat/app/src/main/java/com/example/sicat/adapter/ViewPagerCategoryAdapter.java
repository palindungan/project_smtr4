package com.example.sicat.adapter;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

import com.example.sicat.activities.category.CategoryFragment;
import com.example.sicat.model.Categories;

import java.util.List;

public class ViewPagerCategoryAdapter extends FragmentPagerAdapter {

    private List<Categories.Category> categories;

    public ViewPagerCategoryAdapter(FragmentManager fm, List<Categories.Category> categories) {
        super(fm);
        this.categories = categories;
    }

    @Override
    public Fragment getItem(int i){
        CategoryFragment fragment = new CategoryFragment();
        Bundle args = new Bundle();
        args.putString("EXTRA_DATA_NAME",categories.get(i).getNmKat());
        args.putString("EXTRA_DATA_DESC",categories.get(i).getDeskKat());
        args.putString("EXTRA_DATA_IMAGE",categories.get(i).getGmbrKat());
        // TODO 10. Add argument to fragment
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public int getCount(){return categories.size(); }

    @Nullable
    @Override
    public CharSequence getPageTitle(int position){
        return categories.get(position).getNmKat();
    }
}
