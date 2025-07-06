-- Inserir ambiente
WITH new_env AS (
  INSERT INTO environments (name, logo_url)
  VALUES ('Academia Performance', 'https://example.com/logo.png')
  RETURNING id
),
-- Inserir usuários com diferentes cargos
new_users AS (
  INSERT INTO users (name, email, password, role, environment_id)
  SELECT * FROM (VALUES
    -- Admins
    ('Guilherme Barbosa', 'guui.wb@gmail.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ADMIN'::"USER_ROLE", (SELECT id FROM new_env)),
    
    -- Coaches
    ('Carlos Oliveira', 'carlos.oliveira@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'COACH'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Ana Costa', 'ana.costa@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'COACH'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Pedro Lima', 'pedro.lima@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'COACH'::"USER_ROLE", (SELECT id FROM new_env)),
    
    -- Athletes
    ('Lucas Ferreira', 'lucas.ferreira@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Juliana Almeida', 'juliana.almeida@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Rafael Souza', 'rafael.souza@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Fernanda Rocha', 'fernanda.rocha@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Diego Martins', 'diego.martins@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Camila Pereira', 'camila.pereira@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Thiago Silva', 'thiago.silva@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Bianca Santos', 'bianca.santos@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Gabriel Costa', 'gabriel.costa@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Isabela Lima', 'isabela.lima@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'ATHLETE'::"USER_ROLE", (SELECT id FROM new_env))
  ) AS t(name, email, password, role, environment_id)
  RETURNING id, name, role
),
-- Criar times
new_teams AS (
  INSERT INTO teams (name, environment_id, coach_id)
  SELECT 
    'Time Performance A',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'COACH'::"USER_ROLE")
  UNION ALL
  SELECT 
    'Time Performance B',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'COACH'::"USER_ROLE")
  UNION ALL
  SELECT 
    'Time Iniciantes',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'COACH'::"USER_ROLE")
  RETURNING id, name
),
-- Criar treinos
new_workouts AS (
  INSERT INTO workouts (name, description, scheduled_at, coach_id, environment_id)
  SELECT * FROM (VALUES
    -- Treinos do Carlos Oliveira (Time Performance A)
    ('Treino de Resistência', 'Foco em melhorar a resistência cardiovascular com séries longas', '2024-01-15 07:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Velocidade', 'Séries curtas e intensas para melhorar explosão', '2024-01-17 18:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino Técnico', 'Perfeiçoamento da técnica dos quatro estilos', '2024-01-20 08:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    
    -- Treinos da Ana Costa (Time Performance B)
    ('Treino de Força', 'Exercícios específicos para fortalecimento muscular', '2024-01-16 07:30:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Recuperação', 'Sessão leve para recuperação muscular', '2024-01-18 17:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Competição', 'Simulação de prova com ritmo de competição', '2024-01-21 06:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    
    -- Treinos do Pedro Lima (Time Iniciantes)
    ('Treino Básico', 'Introdução aos fundamentos da natação', '2024-01-15 16:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Adaptação', 'Adaptação ao meio líquido e respiração', '2024-01-17 16:30:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino Lúdico', 'Atividades recreativas na água', '2024-01-19 15:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'COACH'::"USER_ROLE"), (SELECT id FROM new_env))
  ) AS t(name, description, scheduled_at, coach_id, environment_id)
  RETURNING id, name, coach_id
),
-- Adicionar atletas aos times
team_assignments AS (
  INSERT INTO team_users (team_id, user_id)
  SELECT 
    t.id,
    u.id
  FROM new_teams t
  CROSS JOIN new_users u
  WHERE u.role = 'ATHLETE'::"USER_ROLE"
    AND (
      (t.name = 'Time Performance A' AND u.name IN ('Lucas Ferreira', 'Juliana Almeida', 'Rafael Souza', 'Fernanda Rocha'))
      OR (t.name = 'Time Performance B' AND u.name IN ('Diego Martins', 'Camila Pereira', 'Thiago Silva'))
      OR (t.name = 'Time Iniciantes' AND u.name IN ('Bianca Santos', 'Gabriel Costa', 'Isabela Lima'))
    )
  RETURNING team_id, user_id
),
-- Associar treinos aos times correspondentes
workout_team_assignments AS (
  INSERT INTO workout_teams (workout_id, team_id)
  SELECT 
    w.id,
    t.id
  FROM new_workouts w
  JOIN new_teams t ON (
    (w.coach_id = (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'COACH'::"USER_ROLE") AND t.name = 'Time Performance A')
    OR (w.coach_id = (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'COACH'::"USER_ROLE") AND t.name = 'Time Performance B')
    OR (w.coach_id = (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'COACH'::"USER_ROLE") AND t.name = 'Time Iniciantes')
  )
  RETURNING workout_id, team_id
),
-- Criar seções dos treinos
new_workout_sections AS (
  INSERT INTO workout_sections (workout_id, name)
  SELECT * FROM (VALUES
    -- Seções do Treino de Resistência (Carlos Oliveira)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Resistência'), 'Aquecimento'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Resistência'), 'Série Principal'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Resistência'), 'Desaquecimento'),
    
    -- Seções do Treino de Velocidade (Carlos Oliveira)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade'), 'Aquecimento Técnico'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade'), 'Séries de Velocidade'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade'), 'Recuperação Ativa'),
    
    -- Seções do Treino Técnico (Carlos Oliveira)
    ((SELECT id FROM new_workouts WHERE name = 'Treino Técnico'), 'Aquecimento'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Técnico'), 'Técnica Crawl'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Técnico'), 'Técnica Costas'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Técnico'), 'Técnica Peito'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Técnico'), 'Técnica Borboleta'),
    
    -- Seções do Treino de Força (Ana Costa)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Força'), 'Aquecimento'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Força'), 'Séries de Força'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Força'), 'Exercícios Específicos'),
    
    -- Seções do Treino de Recuperação (Ana Costa)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação'), 'Aquecimento Leve'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação'), 'Nado Contínuo'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação'), 'Alongamento'),
    
    -- Seções do Treino de Competição (Ana Costa)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Competição'), 'Aquecimento'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Competição'), 'Simulação de Prova'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Competição'), 'Recuperação'),
    
    -- Seções do Treino Básico (Pedro Lima)
    ((SELECT id FROM new_workouts WHERE name = 'Treino Básico'), 'Adaptação à Água'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Básico'), 'Respiração'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Básico'), 'Flutuação'),
    
    -- Seções do Treino de Adaptação (Pedro Lima)
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação'), 'Familiarização'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação'), 'Exercícios Básicos'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação'), 'Brincadeiras'),
    
    -- Seções do Treino Lúdico (Pedro Lima)
    ((SELECT id FROM new_workouts WHERE name = 'Treino Lúdico'), 'Aquecimento Divertido'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Lúdico'), 'Jogos na Água'),
    ((SELECT id FROM new_workouts WHERE name = 'Treino Lúdico'), 'Atividades em Grupo')
  ) AS t(workout_id, name)
  RETURNING id, name, workout_id
)
-- Criar séries das seções
INSERT INTO workout_section_series (workout_section_id, distance_in_meters, repetitions, interval_in_seconds, intensity_zone, swimming_type, notes)
SELECT * FROM (VALUES
  -- Séries do Aquecimento (Treino de Resistência)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Resistência')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado livre leve para aquecimento'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Resistência')), 100, 2, 30, 'A1'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Costas para alongar'),
  
  -- Séries da Série Principal (Treino de Resistência)
  ((SELECT id FROM new_workout_sections WHERE name = 'Série Principal' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Resistência')), 400, 3, 60, 'A2'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Séries longas para resistência'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Série Principal' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Resistência')), 200, 4, 45, 'A2'::"INTENSITY_ZONE", 'MEDLEY'::"SWIMMING_TYPE", 'Medley para variedade'),
  
  -- Séries do Desaquecimento (Treino de Resistência)
  ((SELECT id FROM new_workout_sections WHERE name = 'Desaquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Resistência')), 100, 2, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado livre leve'),
  
  -- Séries do Aquecimento Técnico (Treino de Velocidade)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento Técnico' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Aquecimento com técnica'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento Técnico' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade')), 50, 4, 20, 'A2'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Borboleta técnica'),
  
  -- Séries das Séries de Velocidade (Treino de Velocidade)
  ((SELECT id FROM new_workout_sections WHERE name = 'Séries de Velocidade' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade')), 50, 8, 30, 'VO2'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Sprint máximo'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Séries de Velocidade' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade')), 25, 10, 20, 'VO2'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Borboleta explosiva'),
  
  -- Séries da Recuperação Ativa (Treino de Velocidade)
  ((SELECT id FROM new_workout_sections WHERE name = 'Recuperação Ativa' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Velocidade')), 100, 2, 0, 'A1'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Costas relaxado'),
  
  -- Séries do Aquecimento (Treino Técnico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Aquecimento geral'),
  
  -- Séries da Técnica Crawl (Treino Técnico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Crawl' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 50, 6, 45, 'A2'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Foco na técnica do crawl'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Crawl' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 25, 8, 30, 'A2'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Exercícios específicos de braçada'),
  
  -- Séries da Técnica Costas (Treino Técnico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Costas' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 50, 4, 45, 'A2'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Técnica de costas'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Costas' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 25, 6, 30, 'A2'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Exercícios de pernada'),
  
  -- Séries da Técnica Peito (Treino Técnico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Peito' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 50, 4, 60, 'A2'::"INTENSITY_ZONE", 'BREASTSTROKE'::"SWIMMING_TYPE", 'Técnica de peito'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Peito' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 25, 6, 45, 'A2'::"INTENSITY_ZONE", 'BREASTSTROKE'::"SWIMMING_TYPE", 'Exercícios de braçada'),
  
  -- Séries da Técnica Borboleta (Treino Técnico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Borboleta' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 25, 8, 45, 'A3'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Técnica de borboleta'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Técnica Borboleta' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Técnico')), 50, 2, 90, 'A3'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Borboleta completa'),
  
  -- Séries do Aquecimento (Treino de Força)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Força')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Aquecimento'),
  
  -- Séries das Séries de Força (Treino de Força)
  ((SELECT id FROM new_workout_sections WHERE name = 'Séries de Força' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Força')), 100, 6, 90, 'A3'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado com palmar'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Séries de Força' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Força')), 50, 8, 60, 'A3'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Borboleta com resistência'),
  
  -- Séries dos Exercícios Específicos (Treino de Força)
  ((SELECT id FROM new_workout_sections WHERE name = 'Exercícios Específicos' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Força')), 25, 10, 45, 'AT'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Sprint com peso'),
  
  -- Séries do Aquecimento Leve (Treino de Recuperação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento Leve' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado livre muito leve'),
  
  -- Séries do Nado Contínuo (Treino de Recuperação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Nado Contínuo' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação')), 400, 2, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado contínuo sem pressão'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Nado Contínuo' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Costas relaxado'),
  
  -- Séries do Alongamento (Treino de Recuperação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Alongamento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Recuperação')), 100, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Nado livre com alongamento'),
  
  -- Séries do Aquecimento (Treino de Competição)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Competição')), 200, 1, 0, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Aquecimento específico'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Competição')), 50, 4, 30, 'A2'::"INTENSITY_ZONE", 'BUTTERFLY'::"SWIMMING_TYPE", 'Aquecimento técnico'),
  
  -- Séries da Simulação de Prova (Treino de Competição)
  ((SELECT id FROM new_workout_sections WHERE name = 'Simulação de Prova' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Competição')), 100, 4, 120, 'AT'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Simulação de 100m livre'),
  ((SELECT id FROM new_workout_sections WHERE name = 'Simulação de Prova' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Competição')), 200, 2, 180, 'AT'::"INTENSITY_ZONE", 'MEDLEY'::"SWIMMING_TYPE", 'Simulação de 200m medley'),
  
  -- Séries da Recuperação (Treino de Competição)
  ((SELECT id FROM new_workout_sections WHERE name = 'Recuperação' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Competição')), 100, 2, 0, 'A1'::"INTENSITY_ZONE", 'BACKSTROKE'::"SWIMMING_TYPE", 'Recuperação ativa'),
  
  -- Séries da Adaptação à Água (Treino Básico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Adaptação à Água' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Básico')), 25, 4, 60, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Primeiros movimentos'),
  
  -- Séries da Respiração (Treino Básico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Respiração' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Básico')), 25, 6, 45, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Exercícios de respiração'),
  
  -- Séries da Flutuação (Treino Básico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Flutuação' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Básico')), 25, 4, 60, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Exercícios de flutuação'),
  
  -- Séries da Familiarização (Treino de Adaptação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Familiarização' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação')), 25, 3, 90, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Familiarização com a água'),
  
  -- Séries dos Exercícios Básicos (Treino de Adaptação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Exercícios Básicos' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação')), 25, 5, 60, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Exercícios básicos de natação'),
  
  -- Séries das Brincadeiras (Treino de Adaptação)
  ((SELECT id FROM new_workout_sections WHERE name = 'Brincadeiras' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino de Adaptação')), 25, 4, 45, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Atividades lúdicas'),
  
  -- Séries do Aquecimento Divertido (Treino Lúdico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Aquecimento Divertido' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Lúdico')), 25, 3, 60, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Aquecimento com brincadeiras'),
  
  -- Séries dos Jogos na Água (Treino Lúdico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Jogos na Água' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Lúdico')), 25, 6, 45, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Jogos e brincadeiras'),
  
  -- Séries das Atividades em Grupo (Treino Lúdico)
  ((SELECT id FROM new_workout_sections WHERE name = 'Atividades em Grupo' AND workout_id = (SELECT id FROM new_workouts WHERE name = 'Treino Lúdico')), 25, 4, 60, 'A1'::"INTENSITY_ZONE", 'FREESTYLE'::"SWIMMING_TYPE", 'Atividades coletivas')
) AS t(workout_section_id, distance_in_meters, repetitions, interval_in_seconds, intensity_zone, swimming_type, notes);