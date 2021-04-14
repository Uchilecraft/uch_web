var url = "https://www.uchilecraft.cl/api/status";
$.getJSON(url, function(r) {
  if (!r.bungee.online){
    $('#motd0').html('Server Offline');
  } else {
    $('#play0').html('<b>Players Online:</b> '+r.bungee.players.online+'/'+r.bungee.players.max);
    $('#motd0').html('¡Bienvenid@ a UChileCraft! Servidor 1.16.5 Towny PvP Destinado a la comunidad de la UChile (e invitados).');
  }
  if (!r.lobby.online){
    $('#motd1').html('Server Offline');
  } else {
    $('#play1').html('<b>Players Online:</b> '+r.lobby.players.online+'/'+r.lobby.players.max);
    $('#motd1').html('¡Bienvenid@ a UChileCraft! Servidor 1.16.5 Towny PvP Destinado a la comunidad de la UChile (e invitados).');
  }
  if (!r.survival.online){
    $('#motd2').html('Server Offline');
  } else {
    $('#play2').html('<b>Players Online:</b> '+r.survival.players.online+'/'+r.survival.players.max);
    $('#motd2').html('¡Bienvenid@ a UChileCraft! Servidor 1.16.5 Towny PvP Destinado a la comunidad de la UChile (e invitados).');
  }
  if (!r.rol.online){
    $('#motd3').html('Server Offline');
  } else {
    $('#play3').html('<b>Players Online:</b> '+r.rol.players.online+'/'+r.rol.players.max);
    $('#motd3').html('¡Bienvenid@ a UChileCraft! Servidor 1.16.5 Towny PvP Destinado a la comunidad de la UChile (e invitados).');
  }
});
