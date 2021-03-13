package com.api.autofact.models.services;

import java.util.List;

import com.api.autofact.models.entity.Quiz;

public interface IQuizService {

	public List<Quiz> findAll();
	
	public Quiz findById(Long id);	
	
	public Quiz save(Quiz quiz);
	
	public void delete(Long id);
}
