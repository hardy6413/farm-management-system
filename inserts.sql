INSERT INTO public.user_account (id, email, password, personal_data_id) VALUES (11, 'pierwszy@gmail.com', '$2y$10$BDKZzswMYbd4L2v4./BtG.zvhbrx8YyrB/i78FOJJ1x9s65J.X8Eu', 17);
INSERT INTO public.user_account (id, email, password, personal_data_id) VALUES (12, 'pracownik@gmail.com', '$2y$10$jrCOX8lkhnYnHUe12N6X.Oqln0OeWx0oxDW8tLzHy.HWHfv7bhkGG', 18);

INSERT INTO public.address (id, street, city, postal_code, building_number) VALUES (75, 'kwiatowa', 'kraków', '33-210', '123');
INSERT INTO public.address (id, street, city, postal_code, building_number) VALUES (76, 'kwiatowa', 'kraków', '33-100', '213');
INSERT INTO public.address (id, street, city, postal_code, building_number) VALUES (77, 'dobra', 'kraków', '33-100', '11');

INSERT INTO public.personal_data (id, first_name, last_name, address_id, farm_id, is_owner) VALUES (17, 'Jan', 'Kowalski', 75, 69, true);
INSERT INTO public.personal_data (id, first_name, last_name, address_id, farm_id, is_owner) VALUES (18, 'pracownik', 'test', 77, 69, false);

INSERT INTO public.farm (id, name, token, image, address_id) VALUES (69, 'Pierwsza farma', 'dfddaf', 'farmimage.jpg', 76);
INSERT INTO public.field (id, name, description, area, extra_payment, block_number, is_property, farm_id, image) VALUES (10, 'pierwsze pole', 'pole o wysokim ph', 2.3, 900, '32', false, 69, 'field.jpg');
INSERT INTO public.field (id, name, description, area, extra_payment, block_number, is_property, farm_id, image) VALUES (11, 'drugie pole', 'pole które często jest podtapiane', 2.3, 0, '12', true, 69, 'field2.jpg');
INSERT INTO public.field (id, name, description, area, extra_payment, block_number, is_property, farm_id, image) VALUES (12, 'trzecie pole', 'dobre pole', 9, 0, '93/3', true, 69, 'pepo.jpg');

INSERT INTO public.task (id, description, is_completed, created_at, farm_id, personal_data_id) VALUES (12, 'pierwsze zadanie', false, '2022-01-26 10:55:09.062491 +00:00', 69, 17);
INSERT INTO public.task (id, description, is_completed, created_at, farm_id, personal_data_id) VALUES (13, 'dolać paliwa do maszyn', false, '2022-01-26 10:55:19.017482 +00:00', 69, 17);

INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (11, 'planting', 16, 'action');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (12, 'dobre warunki do siania - słońce, wilgotność', 16, 'description');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (13, 'soja', 16, 'plant');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (14, '320', 16, 'planting-ratio');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (15, 'Amavit', 16, 'plant-seed-brand');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (16, 'harvesting', 17, 'action');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (17, 'nie najlepszy dzień do zbiorów wilgotność 15%', 17, 'description');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (18, 'soja', 17, 'plant');
INSERT INTO public.param_value (id, value, field_action_id, param_name) VALUES (19, '8T', 17, 'harvest-amount');

INSERT INTO public.field_action (id, field_id, personal_data_id, is_completed, created_at, description, action_name) VALUES (16, 10, 17, false, '2022-01-26 10:50:52.936372 +00:00', 'dobre warunki do siania - słońce, wilgotność', 'planting');
INSERT INTO public.field_action (id, field_id, personal_data_id, is_completed, created_at, description, action_name) VALUES (17, 10, 17, false, '2022-01-26 10:51:56.096511 +00:00', 'nie najlepszy dzień do zbiorów wilgotność 15%', 'harvesting');