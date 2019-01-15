import * as THREE from 'three'
import globeDiffuseSource from '../images/textures/planet/globe/diffuse.jpg'
import globeNormalSource from '../images/textures/planet/globe/normal.jpg'
import globeRoughnessSource from '../images/textures/planet/globe/roughness.jpg'
import cloudsAlphaSource from '../images/textures/planet/clouds/alpha.jpg'
import rockDiffuseAlphaSource from '../images/textures/planet/rock/diffuse-alpha.png'

export default class Planet
{
    constructor()
    {
        this.container = new THREE.Object3D()
        this.container.scale.x = 1
        this.container.scale.y = 1
        this.container.scale.z = 1
        
        this.setTextures()
        this.setGlobe()
        this.setClouds()
        this.setBelt()
        this.setRAF()
    }

    setTextures()
    {
        this.textures = {}
        
        // Loader
        this.textures.loader = new THREE.TextureLoader()

        // Textures
        this.textures.globeDiffuse = this.textures.loader.load(globeDiffuseSource)
        this.textures.globeNormal = this.textures.loader.load(globeNormalSource)
        this.textures.globeRoughness = this.textures.loader.load(globeRoughnessSource)
        this.textures.cloudsAlpha = this.textures.loader.load(cloudsAlphaSource)
        this.textures.rockDiffuseAlpha = this.textures.loader.load(rockDiffuseAlphaSource)
    }

    setGlobe()
    {
        this.globe = {}
        this.globe.geometry = new THREE.SphereBufferGeometry(1, 32, 32)
        this.globe.material = new THREE.MeshStandardMaterial({
            map: this.textures.globeDiffuse,
            normalMap: this.textures.globeNormal,
            metalnessMap: this.textures.globeRoughness,
            roughnessMap: this.textures.globeRoughness
        })
        this.globe.mesh = new THREE.Mesh(this.globe.geometry, this.globe.material)

        this.container.add(this.globe.mesh)
    }

    setClouds()
    {
        this.clouds = {}
        this.clouds.geometry = new THREE.SphereBufferGeometry(1.01, 32, 32)
        this.clouds.material = new THREE.MeshStandardMaterial({
            transparent: true,
            color: 0xffffff,
            alphaMap: this.textures.cloudsAlpha,
            metalness: 0,
            roughness: 0.9
        })
        this.clouds.mesh = new THREE.Mesh(this.clouds.geometry, this.clouds.material)

        this.container.add(this.clouds.mesh)
    }

    setBelt()
    {
        this.belt = {}
        this.belt.geometry = new THREE.Geometry()
        this.belt.material = new THREE.PointsMaterial({
            color: 0xffddcc,
            transparent: true,
            sizeAttenuation: true,
            size: 0.01,
            map: this.textures.rockDiffuseAlpha
        })

        for(let i = 0; i < 300000; i++)
        {
            const vertice = new THREE.Vector3()

            const angle = Math.random() * Math.PI * 2
            const distance = 1.5 + Math.random() * 1.5

            vertice.x = Math.cos(angle) * distance
            vertice.y = (Math.random() - 0.5) * 0.2
            vertice.z = Math.sin(angle) * distance

            this.belt.geometry.vertices.push(vertice)
        }

        this.belt.points = new THREE.Points(this.belt.geometry, this.belt.material)
        this.container.add(this.belt.points)
    }

    setRAF()
    {
        const loop = () =>
        {
            window.requestAnimationFrame(loop)

            this.globe.mesh.rotation.y += 0.001
            this.clouds.mesh.rotation.y += 0.0009
        }
        loop()
    }
}