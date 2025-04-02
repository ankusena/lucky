// Auto Rotation Variables
let isRotating = true;
let rotationSpeed = 10;
const cuboid = document.getElementById("cuboid");

// Manual Rotation Button Below Cuboid
function toggleRotation() {
    if (isRotating) {
        cuboid.style.animationPlayState = "paused";
        isRotating = false;
    } else {
        cuboid.style.animationPlayState = "running";
        isRotating = true;
    }
}

// Touch/Mouse Drag Rotation
let isDragging = false;
let startX, startY, currentX = 0, currentY = 0;

cuboid.addEventListener("mousedown", startDrag);
cuboid.addEventListener("mousemove", drag);
cuboid.addEventListener("mouseup", endDrag);
cuboid.addEventListener("mouseleave", endDrag);

// Touch Events
cuboid.addEventListener("touchstart", startDrag);
cuboid.addEventListener("touchmove", drag);
cuboid.addEventListener("touchend", endDrag);

function startDrag(e) {
    isDragging = true;
    startX = e.clientX || e.touches[0].clientX;
    startY = e.clientY || e.touches[0].clientY;
}

function drag(e) {
    if (!isDragging) return;
    let x = e.clientX || e.touches[0].clientX;
    let y = e.clientY || e.touches[0].clientY;

    let deltaX = (x - startX) * 0.5;
    let deltaY = (y - startY) * 0.5;

    currentX += deltaX;
    currentY += deltaY;

    cuboid.style.transform = `rotateX(${currentY}deg) rotateY(${currentX}deg)`;
    startX = x;
    startY = y;
}

function endDrag() {
    isDragging = false;
}
