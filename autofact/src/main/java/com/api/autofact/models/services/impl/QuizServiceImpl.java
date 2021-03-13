package com.api.autofact.models.services.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.api.autofact.models.dao.IQuizDao;
import com.api.autofact.models.entity.Quiz;
import com.api.autofact.models.services.IQuizService;

@Service
public class QuizServiceImpl implements IQuizService{

	@Autowired
	private IQuizDao quizDao;
	
	@Override
	public List<Quiz> findAll() {
		return quizDao.findAll();
	}

	@Override
	public Quiz findById(Long id) {
		return quizDao.findById(id).orElse(null);
	}

	@Override
	public Quiz save(Quiz quiz) {
		return quizDao.save(quiz);
	}

	@Override
	public void delete(Long id) {
		quizDao.deleteById(id);
	}

}
