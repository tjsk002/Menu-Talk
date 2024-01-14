package com.java.menu.repository;

import com.java.menu.entity.MenuItems;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface MenuRepository extends JpaRepository<MenuItems, Integer> {
}