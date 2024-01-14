package com.java.menu.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.Data;

// 테이블 이름이랑 동일하게 만드는걸 추천
@Entity
@Data
public class MenuItems {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    // jpa가 읽음
    private Integer id;
    private String title;
    private String sub_title;
    private String content;
    private Float price;
    private String tag;
}