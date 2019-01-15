import './css/style.styl'
import grassTextureSource from './images/textures/house/grass.jpg'
import Planet from './js/Planet.js'

import * as THREE from 'three'

/**
 * Sizes
 */
const sizes = {}
sizes.width = window.innerWidth
sizes.height = window.innerHeight

window.addEventListener('resize', () =>
{
    // Save width and height
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    // Update camera
    camera.aspect = sizes.width / sizes.height
    camera.updateProjectionMatrix()

    // Update renderer
    renderer.setSize(sizes.width, sizes.height)
})

/**
 * Cursor
 */
const cursor = { x: 0.5, y: 0.5 }

window.addEventListener('mousemove', (_event) =>
{
    cursor.x = _event.clientX / sizes.width - 0.5
    cursor.y = _event.clientY / sizes.height - 0.5
})

/**
 * Textures
 */
const textureLoader = new THREE.TextureLoader()

// const grassTexture = textureLoader.load(grassTextureSource)
// grassTexture.wrapS = THREE.RepeatWrapping
// grassTexture.wrapT = THREE.RepeatWrapping
// grassTexture.repeat.set(4, 4)

/**
 * Scene
 */
const scene = new THREE.Scene()

/**
 * Camera
 */
const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height, 0.01, 10)
camera.position.z = 3
scene.add(camera)

/**
 * Planet
 */
const planet = new Planet()
scene.add(planet.container)

// /**
//  * House
//  */
// const house = new THREE.Object3D()
// scene.add(house)

// const floor = new THREE.Mesh(
//     new THREE.PlaneGeometry(4, 4, 1, 1),
//     new THREE.MeshStandardMaterial({ color: 0x66bb66, metalness: 0.3, roughness: 0.8, map: grassTexture })
// )
// floor.rotation.x = - Math.PI * 0.5
// floor.position.y = - 0.5
// floor.receiveShadow = true
// house.add(floor)

// const walls = new THREE.Mesh(
//     new THREE.BoxGeometry(1.5, 1, 1.5),
//     new THREE.MeshStandardMaterial({ color: 0xffcc99, metalness: 0.3, roughness: 0.8 })
// )
// walls.castShadow = true
// walls.receiveShadow = true
// house.add(walls)

// const roof = new THREE.Mesh(
//     new THREE.ConeGeometry(1.2, 0.6, 0.04),
//     new THREE.MeshStandardMaterial({ color: 0x885522, metalness: 0.3, roughness: 0.8 })
// )
// roof.position.y += 0.8
// roof.rotation.y += Math.PI * 0.25
// roof.castShadow = true
// house.add(roof)

// const door = new THREE.Mesh(
//     new THREE.BoxGeometry(0.02, 0.4, 0.2),
//     new THREE.MeshStandardMaterial({ color: 0xff8866, metalness: 0.3, roughness: 0.8 })
// )
// door.position.x = - 0.76
// door.position.y = - 0.3
// door.castShadow = true
// door.receiveShadow = true
// house.add(door)

// const bush1 = new THREE.Mesh(
//     new THREE.SphereGeometry(0.1, 0.32, 0.32),
//     new THREE.MeshStandardMaterial({ color: 0x228833, metalness: 0.3, roughness: 0.8 })
// )
// bush1.position.x = - 0.8
// bush1.position.z = 0.2
// bush1.position.y = - 0.45
// bush1.castShadow = true
// bush1.receiveShadow = true
// house.add(bush1)

// const bush2 = new THREE.Mesh(
//     new THREE.SphereGeometry(0.08, 32, 32),
//     new THREE.MeshStandardMaterial({ color: 0x228833, metalness: 0.3, roughness: 0.8 })
// )
// bush2.position.x = - 0.8
// bush2.position.z = - 0.2
// bush2.position.y = - 0.48
// bush2.castShadow = true
// bush2.receiveShadow = true
// house.add(bush2)

/**
 * Lights
 */
// const doorLight = new THREE.PointLight()
// doorLight.position.x = -1.02
// doorLight.position.y = 0
// doorLight.position.z = 0
// doorLight.castShadow = true
// house.add(doorLight)

const ambientLight = new THREE.AmbientLight(0xffffff, 0.1)
scene.add(ambientLight)

const sunLight = new THREE.DirectionalLight(0xffcccc, 1.2)
sunLight.position.x = 1
sunLight.position.y = 1
sunLight.position.z = 1
sunLight.castShadow = true
sunLight.shadow.camera.top = 1.20
sunLight.shadow.camera.right = 1.20
sunLight.shadow.camera.bottom = - 1.20
sunLight.shadow.camera.left = - 1.20
scene.add(sunLight)

// /**
//  * Shader
//  */
// const shaderGeometry = new THREE.SphereGeometry(1.5, 46, 46)
// const shaderMaterial = new THREE.ShaderMaterial({
//     uniforms:
//     {
//         uTime: { value: 0 }
//     },
//     vertexShader:
//     `
//         #define M_PI 3.1415926535897932384626433832795

//         uniform float uTime;

//         varying vec3 vNormal;
//         varying float vOffset;

//         void main()
//         {
//             vec4 modelPosition = modelMatrix * vec4(position, 1.0);

//             float offset = 0.0;
//             offset += sin(modelPosition.y * 20.0 - uTime * 0.03);
//             offset += sin(uv.x * M_PI * 2.0 - uTime * 0.03);
//             modelPosition.xyz += normal * offset * 0.1;

//             vOffset = offset;

//             vNormal = normal;

//             gl_Position = projectionMatrix * viewMatrix * modelPosition;
//         }
//     `,
//     fragmentShader:
//     `
//         varying vec3 vNormal;
//         varying float vOffset;

//         void main()
//         {
//             vec3 color = vNormal;
//             color += vec3(vOffset * 0.5);

//             gl_FragColor = vec4(color, 1.0);
//         }
//     `
// })
// const shaderMesh = new THREE.Mesh(shaderGeometry, shaderMaterial)
// scene.add(shaderMesh)

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer()
renderer.shadowMap.enabled = true
renderer.setSize(sizes.width, sizes.height)
document.body.appendChild(renderer.domElement)

/**
 * Loop
 */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // // Shader
    // shaderMaterial.uniforms.uTime.value += 1

    // // Update mesh
    // house.rotation.y += 0.003

    // Update camera
    camera.position.x = cursor.x * 3
    camera.position.y = - cursor.y * 3
    camera.lookAt(scene.position)

    // Render
    renderer.render(scene, camera)
}

loop()