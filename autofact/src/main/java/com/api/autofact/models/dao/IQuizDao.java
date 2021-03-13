package com.api.autofact.models.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import com.api.autofact.models.entity.Quiz;

public interface IQuizDao  extends JpaRepository<Quiz, Long>{

}
