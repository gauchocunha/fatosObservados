select `protestos`.`protestos`.`id` AS `id`,
`protestos`.`idDentista` AS `idDentista`,
`protestos`.`dentistas`.`nome` AS `nomeDentista`,
`protestos`.`dentistas`.`cpf` AS `cpf`,
date_format(`protestos`.`protestos`.`dataProtesto`,'%d/%m/%Y' ) AS `dataProtesto`,
date_format(`protestos`.`protestos`.`dataProtesto`,'%Y' ) AS `ano`,
date_format(`protestos`.`protestos`.`dataPagamento`,'%d/%m/%Y' ) AS `dataPagamento`,
`protestos`.`cartorios`.`id` AS `idCartorio`,
`protestos`.`cartorios`.`nome` AS `cartorio`,
`protestos`.`municipios`.`id` AS `idMunicipio`,
`protestos`.`municipios`.`nome` AS `municipio`,
`protestos`.`protestos`.`valorProtestado` AS `valor`
from `protestos`.`protestos` join `protestos`.`cartorios`
join `protestos`.`municipios`
JOIN `protestos`.`dentistas`
where `protestos`.`protestos`.`idCartorio` = `protestos`.`cartorios`.`id`
and `protestos`.`cartorios`.`idMunicipio` = `protestos`.`municipios`.`id`
and `protestos`.`protestos`.`idDentista` = `protestos`.`dentistas`.`id`                                                                                                                               ) order by `protestos`.`protestos`.`dataProtesto`

