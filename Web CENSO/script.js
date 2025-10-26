let count = 0;

function addMember() {
  const container = document.getElementById("membersContainer");
  const memberId = `member-${count}`;
  const html = `
    <div class="member" id="${memberId}">
      <h4>Miembro ${count + 1}</h4>
      <button type="button" onclick="removeMember('${memberId}')">Eliminar</button>
      <input name="name[]" placeholder="Nombre" required onblur="autoDetectGender(this)">
      <input name="dob[]" type="date" required>
      <input name="age[]" type="number" placeholder="Edad" required>
      <select name="gender[]">
        <option value="">Detectar automáticamente</option>
        <option value="H">Hombre</option>
        <option value="M">Mujer</option>
      </select>
      <input name="pfMethod[]" placeholder="Método PF">
      <input name="sterilized[]" placeholder="Esterilizado (Sí/No)">
      <input name="postpartumRef[]" placeholder="Referencia postparto">
      <input name="visitDate[]" type="date" placeholder="Fecha visita">
      <input name="phone[]" placeholder="Teléfono">
      <input name="address[]" placeholder="Dirección">
      <input name="educationLevel[]" placeholder="Nivel educativo">
      <input name="schoolName[]" placeholder="Nombre escuela">
      <input name="disability[]" placeholder="Discapacidad (Sí/No)">
      <input name="medicalCare[]" placeholder="Atención médica (Sí/No)">
      <input name="occupation[]" placeholder="Ocupación">
      <input name="income[]" type="number" placeholder="Ingreso mensual">
      <input name="housing[]" placeholder="Condición vivienda">
    </div>
  `;
  container.insertAdjacentHTML("beforeend", html);
  count++;
}

function removeMember(id) {
  const member = document.getElementById(id);
  if (member) member.remove();
}

function autoDetectGender(input) {
  const name = input.value.toLowerCase();
  const genderSelect = input.parentElement.querySelector("select[name='gender[]']");
  if (name.endsWith("a")) genderSelect.value = "M";
  else if (name.endsWith("o")) genderSelect.value = "H";
}