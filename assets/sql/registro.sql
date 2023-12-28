CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `rut` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `candidato` varchar(50) NOT NULL,
  `nosotros` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

