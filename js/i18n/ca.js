// ParsleyConfig definition if not already set
window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig.i18n = window.ParsleyConfig.i18n || {};

window.ParsleyConfig.i18n.ca = $.extend(window.ParsleyConfig.i18n.ca || {}, {
  defaultMessage: "Aquest valor sembla ser invàlid",
  type: {
    email:        "Aquest valor ha de ser un correu vàlid",
    url:          "Aquest valor ha de ser una URL válida",
    number:       "Aquest valor ha de ser un número vàlid",
    integer:      "Aquest valor ha de ser un número vàlid",
    digits:       "Aquest valor ha de ser un dígito vàlid",
    alphanum:     "Aquest valor ha de ser alfanumèric"
  },
  notblank:       "Aquest valor ha de d'estar en blanc",
  required:       "Aquest valor és requerit",
  pattern:        "Aquest valor és incorrecte",
  min:            "Aquest valor no pot ser menor que %s",
  max:            "Aquest valor no pot ser major que %s",
  range:          "Aquest valor ha d'estar estar entre %s y %s",
  minlength:      "Aquest valor és molt curt. La longitud mínima és de %s caràcters",
  maxlength:      "Aquest valor es molt llarg. La longitud máxima és de %s caràcters",
  length:         "La longitud d'aquest valor ha d'estar entre %s i %s caràcters",
  mincheck:       "Ha de seleccionar almenys %s opcions",
  maxcheck:       "Ha de seleccionar %s opcions o menys",
  rangecheck:     "Ha de seleccionar entre %s i %s opcions",
  equalto:        "Aquest valor ha de ser idèntico"
});

// If file is loaded after Parsley main file, auto-load locale
if ('undefined' !== typeof window.ParsleyValidator)
  window.ParsleyValidator.addCatalog('ca', window.ParsleyConfig.i18n.ca, true);
