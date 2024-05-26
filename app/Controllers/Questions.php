<?php

namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\AnswerModel;

class Questions extends BaseController {
    public function index() {
        $questionModel = new QuestionModel();
        $answerModel = new AnswerModel();

        $questions = $questionModel->findAll();
        foreach ($questions as &$question) {
            $question['answers'] = $answerModel->where('question_id', $question['id'])->findAll();
        }

        return view('questions', ['questions' => $questions]);
    }

    public function add() {
        return view('add_question');
    }

    public function create() {
        $questionModel = new QuestionModel();
        $answerModel = new AnswerModel();

        $questionText = $this->request->getPost('question');
        $answers = $this->request->getPost('answers');
        $correctAnswer = $this->request->getPost('correct_answer');

        $questionModel->save(['question' => $questionText]);
        $questionId = $questionModel->insertID();

        foreach ($answers as $index => $answer) {
            $answerModel->save([
                'question_id' => $questionId,
                'answer' => $answer,
                'correct' => $index == $correctAnswer ? 1 : 0
            ]);
        }

        return redirect()->to('/questions');
    }

    public function delete($id) {
        $questionModel = new QuestionModel();
        $answerModel = new AnswerModel();

        $answerModel->where('question_id', $id)->delete();
        $questionModel->delete($id);

        return redirect()->to('/questions');
    }

    public function edit($id) {
        $questionModel = new QuestionModel();
        $answerModel = new AnswerModel();

        $question = $questionModel->find($id);
        $question['answers'] = $answerModel->where('question_id', $id)->findAll();

        return view('edit_question', ['question' => $question]);
    }

    public function update($id) {
        $questionModel = new QuestionModel();
        $answerModel = new AnswerModel();

        $questionText = $this->request->getPost('question');
        $answers = $this->request->getPost('answers');
        $correctAnswer = $this->request->getPost('correct_answer');

        $questionModel->update($id, ['question' => $questionText]);
        $answerModel->where('question_id', $id)->delete();

        foreach ($answers as $index => $answer) {
            $answerModel->save([
                'question_id' => $id,
                'answer' => $answer,
                'correct' => $index == $correctAnswer ? 1 : 0
            ]);
        }

        return redirect()->to('/questions');
    }
}