function kontrola()
{
if (document.pform.nazwisko.value == "")
  {
    alert("Proszę podać imię i nazwisko !");
    return false;
  };

  if (document.pform.telefon.value == "")
  {
    alert("Proszę podać numer telefonu !");
    return false;
  };
  if (document.pform.email.value == "")
  {
    alert("Proszę podać adres e-mail !");
    return false;
  };
  if (document.pform.pytanie.value == "")
  {
    alert("Proszę podać treść zapytania!");
    return false;
  };
  if (document.pform.captcha_code.value == "")
  {
    alert("Proszę wpisać kod z obrazka !");
    return false;
  };      
  document.pform.submit();
}

function kontrola2()
{
if (document.pform.nazwa.value == "")
  {
    alert("Proszę podać nazwę Towarzystwa Ubezpieczeniowego !");
    return false;
  };

  if (document.pform.nr_sprawy.value == "")
  {
    alert("Proszę podać numer sprawy !");
    return false;
  };
  if (document.pform.nr_faktury.value == "")
  {
    alert("Proszę podać numer faktury !");
    return false;
  };
  if (document.pform.email.value == "")
  {
    alert("Proszę podać e-mail zwrotny!");
    return false;
  };
  if (document.pform.uwagi.value == "")
  {
    alert("Proszę podać uwagi!");
    return false;
  };
  if (document.pform.captcha_code.value == "")
  {
    alert("Proszę wpisać kod z obrazka !");
    return false;
  };      
  document.pform.submit();
}