DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

CREATE TYPE "USER_ROLE" AS ENUM (
  'athlete',
  'coach',
  'admin'
);

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

CREATE TABLE "environments" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "name" varchar NOT NULL,
  "logo_url" varchar,
  "created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

CREATE TABLE "users" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "environment_id" uuid NOT NULL,
  "name" varchar NOT NULL,
  "email" varchar NOT NULL,
  "password" varchar NOT NULL,
  "role" "USER_ROLE" NOT NULL,
	"created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

CREATE TABLE "teams" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "environment_id" uuid NOT NULL,
  "coach_id" uuid NOT NULL,
  "name" varchar NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

CREATE TABLE "team_users" (
  "team_id" uuid NOT NULL, 
  "user_id" uuid NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL,
  PRIMARY KEY ("team_id", "user_id")
);

CREATE TABLE "workouts" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "environment_id" uuid NOT NULL,
  "coach_id" uuid NOT NULL,
  "name" varchar NOT NULL,
  "description" varchar,
  "scheduled_at" timestamp NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

CREATE TABLE "workout_users" (
  "user_id" uuid NOT NULL,
  "workout_id" uuid NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL,
  PRIMARY KEY ("user_id", "workout_id")
);

ALTER TABLE "teams" ADD FOREIGN KEY ("coach_id") REFERENCES "users" ("id");

ALTER TABLE "users" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "teams" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "workouts" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "workouts" ADD FOREIGN KEY ("coach_id") REFERENCES "users" ("id");

ALTER TABLE "team_users" ADD FOREIGN KEY ("team_id") REFERENCES "teams" ("id");

ALTER TABLE "team_users" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "workout_users" ADD FOREIGN KEY ("workout_id") REFERENCES "workouts" ("id");

ALTER TABLE "workout_users" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");