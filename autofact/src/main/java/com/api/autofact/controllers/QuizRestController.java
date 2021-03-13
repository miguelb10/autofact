package com.api.autofact.controllers;

import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataAccessException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.api.autofact.models.entity.Quiz;
import com.api.autofact.models.services.IQuizService;

@RestController
@RequestMapping("/api")
public class QuizRestController {
	@Autowired
	private IQuizService quizService;
	
	@GetMapping("quizzes")
	public List<Quiz> getQuizzes() {
		return quizService.findAll();
	}
	
	@PostMapping("quiz/save")
	public ResponseEntity<?> create(@Valid @RequestBody Quiz quiz, BindingResult result) {
		Quiz quizNew = null;
		Map<String, Object> response = new HashMap<>();
		Date fechaActual = new Date();
		quiz.setFechaCreacion(fechaActual);

		try {
			quizNew = quizService.save(quiz);
		} catch (DataAccessException e) {
			response.put("mensaje", "Error al realizar el insert en la base de datos");
			response.put("error", e.getMessage().concat(": ").concat(e.getMostSpecificCause().getMessage()));
			return new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);
		}
		response.put("mensaje", "El registro ha sido creado con éxito!");
		response.put("quiz", quizNew);
		return new ResponseEntity<Map<String, Object>>(response, HttpStatus.CREATED);
	}
}
