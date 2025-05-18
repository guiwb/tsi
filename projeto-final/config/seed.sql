WITH new_env AS (
  INSERT INTO environments (name)
  VALUES ('Escola do Gui')
  RETURNING id
)
INSERT INTO users (name, email, password, role, environment_id)
SELECT
  'Guilherme Barbosa',
  'guui.wb@gmail.com',
  '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6',
  'admin',
  id
FROM new_env;