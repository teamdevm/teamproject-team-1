--
-- Индексы таблицы `bludo`
--
ALTER TABLE `bludo`
  ADD PRIMARY KEY (`id_bludo`);

--
-- Индексы таблицы `ing`
--
ALTER TABLE `ing`
  ADD PRIMARY KEY (`id_ing`);

--
-- Индексы таблицы `rec`
--
ALTER TABLE `rec`
  ADD KEY `id_bludo_r` (`id_bludo_r`),
  ADD KEY `id_ing_r` (`id_ing_r`),
  ADD KEY `id_step_r` (`id_step_r`);

--
-- Ограничения внешнего ключа таблицы `mass`
--
ALTER TABLE `mass`
  ADD CONSTRAINT `mass_ibfk_1` FOREIGN KEY (`id_ing_m`) REFERENCES `ing` (`id_ing`);

--
-- Ограничения внешнего ключа таблицы `rec`
--
ALTER TABLE `rec`
  ADD CONSTRAINT `rec_ibfk_1` FOREIGN KEY (`id_bludo_r`) REFERENCES `bludo` (`id_bludo`),
  ADD CONSTRAINT `rec_ibfk_2` FOREIGN KEY (`id_ing_r`) REFERENCES `ing` (`id_ing`),
  ADD CONSTRAINT `rec_ibfk_3` FOREIGN KEY (`id_step_r`) REFERENCES `steps` (`id_step`);
COMMIT;