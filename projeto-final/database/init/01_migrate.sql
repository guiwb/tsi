DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

CREATE TYPE "USER_ROLE" AS ENUM (
  'ATHLETE',
  'COACH',
  'ADMIN'
);

CREATE TYPE "SWIMMING_TYPE" AS ENUM (
  'FREESTYLE',
  'CRAWL',
  'BACKSTROKE',
  'BREASTSTROKE',
  'BUTTERFLY',
  'MEDLEY',
  'RELAY'
);

CREATE TYPE "INTENSITY_ZONE" AS ENUM (
  'A1',
  'A2',
  'A3',
  'AT',
  'VO2'
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
  "profile_picture" varchar DEFAULT NULL,
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
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "team_id" uuid NOT NULL, 
  "user_id" uuid NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL,
  CONSTRAINT "unique_active_team_user" UNIQUE ("team_id", "user_id", "deleted_at")
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

CREATE TABLE "workout_teams" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "team_id" uuid NOT NULL,
  "workout_id" uuid NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL,
  CONSTRAINT "unique_active_workout_team" UNIQUE ("team_id", "workout_id", "deleted_at")
);

CREATE TABLE "workout_sections" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "workout_id" uuid NOT NULL,
  "name" varchar NOT NULL,
  "created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

CREATE TABLE "workout_section_series" (
  "id" uuid PRIMARY KEY DEFAULT uuid_generate_v4(),
  "workout_section_id" uuid NOT NULL,
  "distance_in_meters" integer NOT NULL,
  "repetitions" integer NOT NULL,
  "interval_in_seconds" integer NOT NULL,
  "intensity_zone" "INTENSITY_ZONE" NOT NULL,
  "swimming_type" "SWIMMING_TYPE" NOT NULL,
  "notes" varchar,
  "created_at" timestamp DEFAULT now(),
  "updated_at" timestamp DEFAULT now(),
  "deleted_at" timestamp DEFAULT NULL
);

ALTER TABLE "teams" ADD FOREIGN KEY ("coach_id") REFERENCES "users" ("id");

ALTER TABLE "users" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "teams" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "workouts" ADD FOREIGN KEY ("environment_id") REFERENCES "environments" ("id");

ALTER TABLE "workouts" ADD FOREIGN KEY ("coach_id") REFERENCES "users" ("id");

ALTER TABLE "team_users" ADD FOREIGN KEY ("team_id") REFERENCES "teams" ("id");

ALTER TABLE "team_users" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "workout_teams" ADD FOREIGN KEY ("team_id") REFERENCES "teams" ("id");

ALTER TABLE "workout_teams" ADD FOREIGN KEY ("workout_id") REFERENCES "workouts" ("id");

ALTER TABLE "workout_sections" ADD FOREIGN KEY ("workout_id") REFERENCES "workouts" ("id");

ALTER TABLE "workout_section_series" ADD FOREIGN KEY ("workout_section_id") REFERENCES "workout_sections" ("id");