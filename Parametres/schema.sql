CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `maindepense` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `somme` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `numMois` int(11) NOT NULL,
  `mois` varchar(100) NOT NULL,
  `salaire` double NOT NULL,
  `depense` double NOT NULL,
  `benefice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `salairemoyen` (
  `id` int(11) NOT NULL,
  `salMoyen` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `maindepense`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `salairemoyen`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `maindepense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `salairemoyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--
-- INSERTION DE L'ADMINISTRATEUR
--

INSERT INTO `log` (`login`, `mdp`) VALUES ('admin', '$1$BFTVEq33$j6vpAzOvj2zqEixvDRbnd0');
