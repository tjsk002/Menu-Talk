package com.java.menu.service;

import com.java.menu.entity.MenuItems;
import com.java.menu.repository.MenuRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.awt.*;

@Service
public class MenuService {
    @Autowired
    private MenuRepository menuRepository;

    public void write(MenuItems menuItems){
        menuRepository.save(menuItems);
    }
}
