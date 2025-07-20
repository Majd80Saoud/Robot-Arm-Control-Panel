function updateValue(index, val) {
  document.getElementById("value" + (index + 1)).innerText = val;
}

function savePosition() {
  const motors = [];
  for (let i = 1; i <= 6; i++) {
    motors.push(document.getElementById("motor" + i).value);
  }

  fetch('save_pose.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ motors })
  })
  .then(res => res.text())
  .then(response => {
    console.log(response);
    loadTable();
  });
}

function resetSliders() {
  for (let i = 1; i <= 6; i++) {
    document.getElementById("motor" + i).value = 90;
    document.getElementById("value" + i).innerText = 90;
  }
}

function runSliders() {
  alert("تشغيل كل الوضعيات غير مفعّل بعد.");
}

function loadTable() {
  fetch('get_run_pose.php')
    .then(res => res.json())
    .then(data => {
      const table = document.getElementById("positionTable");
      table.innerHTML = "";
      data.forEach((pose, index) => {
        const row = table.insertRow();
        row.insertCell(0).innerText = index + 1;
        for (let i = 1; i <= 6; i++) {
          row.insertCell(i).innerText = pose["servo" + i];
        }
        const actionCell = row.insertCell(7);
        actionCell.innerHTML = `
          <button onclick="loadPose(${pose.ID})">Load</button>
          <button onclick="removePose(${pose.ID})">Remove</button>
        `;
      });
    });
}

function loadPose(id) {
  fetch('get_run_pose.php')
    .then(res => res.json())
    .then(data => {
      const pose = data.find(p => p.ID == id);
      if (pose) {
        for (let i = 1; i <= 6; i++) {
          document.getElementById("motor" + i).value = pose["servo" + i];
          document.getElementById("value" + i).innerText = pose["servo" + i];
        }
      }
    });
}

function removePose(id) {
  fetch('update_status.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'id=' + id
  })
  .then(res => res.text())
  .then(response => {
    console.log(response);
    loadTable();
  });
}