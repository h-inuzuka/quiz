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
    answer_id integer not null,
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
    created_at text not null,
    updated_at text not null
);
