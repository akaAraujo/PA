CREATE DATABASE AYDY;
USE AYDY;

CREATE TABLE TB_ALUNO (
    ALU_RA INT NOT NULL,
    ALU_SENHA VARCHAR(15) NOT NULL,
    PRIMARY KEY (ALU_RA)
);
CREATE TABLE TB_PROFESSOR (
    PROF_LOG INT NOT NULL,
    PROF_SENHA VARCHAR(15) NOT NULL,
    PRIMARY KEY (PROF_LOG)
);
CREATE TABLE TB_EMPRESA (
    EMP_ID INT NOT NULL AUTO_INCREMENT,
	EMP_CNPJ VARCHAR(20) NOT NULL,
    EMP_RAZAO VARCHAR(50) NOT NULL,
    EMP_FANTASIA VARCHAR(50),
    EMP_SENHA VARCHAR(15) NOT NULL,
    EMP_EMAIL VARCHAR(50),
    EMP_ESTADO VARCHAR(50),
    EMP_CIDADE VARCHAR(50),
    EMP_BAIRRO VARCHAR(50),
    EMP_RUA VARCHAR(50),
    EMP_NUMERO VARCHAR(50),
    EMP_CEP VARCHAR(50),
    EMP_IMG VARCHAR(200),
    PRIMARY KEY (EMP_ID)
);
CREATE TABLE TB_VAGA (
    VAG_ID INT NOT NULL AUTO_INCREMENT,
    VAG_EMP INT NOT NULL,
    VAG_NOME VARCHAR(50) NOT NULL,
    VAG_AREA VARCHAR(50) NOT NULL, 
    VAG_CIDADE VARCHAR(10) NOT NULL, 
    VAG_ESTADO VARCHAR(2) NOT NULL,
    VAG_REGIME VARCHAR(10) NOT NULL,
    VAG_SITUACAO varchar(10) DEFAULT 'Pendente',
    VAG_DATAINICIO DATE,
    VAG_DATAFIM DATE,
    VAG_REMUNERACAO FLOAT,
    VAG_DESCRICAO VARCHAR(255),
    VAG_IMG VARCHAR(200),
    CONSTRAINT TB_VAGAFK FOREIGN KEY (VAG_EMP) REFERENCES TB_EMPRESA (EMP_ID),
    PRIMARY KEY (VAG_ID)
);

CREATE TABLE TB_CURRICULUM (
    VAG_ID INT NOT NULL AUTO_INCREMENT,
    CUR_NOME VARCHAR(50) NOT NULL,
    CUR_RA INT NOT NULL,
    CUR_EMAIL VARCHAR(30),
    CUR_DTNASCIMENTO DATE,
    CUR_TELEFONE VARCHAR(15),
    CUR_CIDADE VARCHAR(20),
    CUR_ENDERECO TEXT,
    CUR_LINKEDIN VARCHAR(50),
    CUR_AREA VARCHAR(40),
    CUR_OBJETIVO TEXT,
    CUR_EXPFUNCAO VARCHAR(100),
    CUR_EXPEMPRESA VARCHAR(50),
    CUR_DESFUNCAO TEXT,
    CUR_FORMACAO VARCHAR(50),
    CUR_INTITUICAO VARCHAR(30),
    CUR_INICIO DATE,
    CUR_TERMINO DATE,
    CUR_IDIOMA VARCHAR(20),
    CUR_IDIOMANIVEL VARCHAR(20),
    CONSTRAINT TB_CURRICULUMFK FOREIGN KEY (CUR_RA) REFERENCES TB_ALUNO (ALU_RA),
    PRIMARY KEY (VAG_ID)
);

/*
INSERT INTO TB_ALUNO (ALU_RA, ALU_SENHA)
VALUES (109518, 'teste');

INSERT INTO TB_PROFESSOR (PROF_LOG, PROF_SENHA)
VALUES (1234567, 'teste');

INSERT INTO TB_EMPRESA (EMP_RAZAO, EMP_CNPJ, EMP_SENHA)
VALUES ('teste', 12345678901234, 'teste');
*/