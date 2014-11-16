drop table if exists questions;
create table questions 
(
    id integer primary key not null,
    title text not null,
    content text not null,
    choice1 text not null,
    choice2 text not null,
    choice3 text not null,
    choice4 text not null,
    correct_answer integer not null,
    created_at text not null,
    updated_at text not null
);

drop table if exists quizzes;
create table quizzes
(
    id integer primary key not null,
    title text not null,
    created_at text not null,
    updated_at text not null
);

drop table if exists answers;
create table answers 
(
    id integer primary key not null,
    quiz_id integer not null,
    answer_status integer not null,
    nickname text not null,
    start_time text not null,
    end_time text, 
    answer1 int,
    answer2 int,
    answer3 int,
    answer4 int,
    answer5 int,
    answer6 int,
    answer7 int,
    answer8 int,
    answer9 int,
    answer10 int,
    created_at text not null,
    updated_at text not null
);

drop table if exists comments;
create table comments 
(
    id integer primary key not null,
    comment integer not null,
    created_at text not null,
    updated_at text not null
);

drop table if exists question_quiz;
create table question_quiz
(
    id integer primary key not null,
    question_id integer not null,
    quiz_id integer not null,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP not null,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP not null
);
